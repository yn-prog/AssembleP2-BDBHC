<?php

namespace App\Http\Controllers;

use App\Models\HealthRecord;
use App\Models\HistoryRecord;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PatientReportController extends Controller
{
    // Page configuration constants
    private const PAGE_HEIGHT = 297;
    private const LEFT_MARGIN = 8;  // Reduced from 10 to 8 for better centering
    private const RIGHT_MARGIN = 202; // Increased from 200 to 202
    private const CONTENT_WIDTH = 194; // Increased from 190 to 194
    private const FOOTER_HEIGHT = 50;
    private const HEADER_HEIGHT = 60;

    public function printPatientReport(Request $request, $id)
    {
        // ✅ Get patient data with diagnoses
        $patient = HealthRecord::with('diagnoses')->findOrFail($id);

        // ✅ Build query for history records
        $historyQuery = HistoryRecord::with('user')
            ->where('health_record_id', $id);

        // ✅ Apply date range filter if provided
        if ($request->filled('from') && $request->filled('to')) {
            $historyQuery->whereBetween('consultation_date', [
                $request->input('from'),
                $request->input('to')
            ]);
        }

        // ✅ Apply diagnosis filter if provided
        if ($request->filled('diagnosis')) {
            $diagnosis = $request->input('diagnosis');
            $historyQuery->where('medical_diagnosis', 'LIKE', "%{$diagnosis}%");
        }

        // ✅ Get filtered history results
        $history = $historyQuery->orderBy('consultation_date', 'asc')->get();

        // ✅ Initialize PDF
        $pdf = new Fpdi();
        $templatePath = storage_path('app/templates/health_records_template.pdf');
        $pdf->setSourceFile($templatePath);
        $tplIdx = $pdf->importPage(1);
        
        $this->addNewPage($pdf, $tplIdx);

        // ✅ Add patient information section
        $currentY = $this->addPatientInfoSection($pdf, $patient);

        // ✅ Add filtered medical history section
        $this->addMedicalHistorySection($pdf, $history, $currentY, $tplIdx);

        // ✅ Add footer to last page
        $this->addProfessionalFooter($pdf);

        // ✅ Show filtered PDF
        return response($pdf->Output('S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="patient_record_' . $patient->id . '.pdf"');
    }

    private function addNewPage($pdf, $tplIdx, $isFirstPage = true)
    {
        if (!$isFirstPage) {
            $pdf->AddPage();
        } else {
            $pdf->AddPage();
        }
        $pdf->useTemplate($tplIdx, 0, 0, 210);
        return self::HEADER_HEIGHT;
    }

    private function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    private function formatFullAge($birthDate)
    {
        if (!$birthDate) return 'N/A';

        $birthDate = \Carbon\Carbon::parse($birthDate);
        $now = \Carbon\Carbon::now();

        // ✅ Always an integer
        $years = (int) $birthDate->diffInYears($now);

        if ($years >= 1) {
            return $years . ' year' . ($years > 1 ? 's' : '') . ' old';
        }

        $months = (int) $birthDate->diffInMonths($now);
        if ($months >= 1) {
            return $months . ' month' . ($months > 1 ? 's' : '') . ' old';
        }

        $weeks = (int) $birthDate->diffInWeeks($now);
        if ($weeks >= 1) {
            return $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' old';
        }

        $days = (int) $birthDate->diffInDays($now);
        if ($days >= 1) {
            return $days . ' day' . ($days > 1 ? 's' : '') . ' old';
        }

        return 'Less than a day old';
    }

    private function addPatientInfoSection($pdf, $patient)
    {
        $startY = self::HEADER_HEIGHT;
        
        // Section header
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(self::LEFT_MARGIN, $startY);
        $pdf->Cell(self::CONTENT_WIDTH, 8, 'PATIENT INFORMATION', 0, 1, 'L');
        
        // Decorative line
        $pdf->SetLineWidth(0.8);
        $pdf->SetDrawColor(50, 50, 50);
        $pdf->Line(self::LEFT_MARGIN, $startY + 10, self::LEFT_MARGIN + self::CONTENT_WIDTH, $startY + 10);
        
        $currentY = $startY + 18;
        
        // Patient info in organized layout
        $pdf->SetFont('Helvetica', '', 10);
        $lineHeight = 6;
        $labelWidth = 35;
        $valueWidth = 60;
        
        // Left column data
        $leftColumnData = [
            ['Name:', "{$patient->first_name} {$patient->last_name}"],
            ['Age:', $this->formatFullAge($patient->birth_date)],
            ['Gender:', $patient->gender],
            ['Blood Type:', $patient->blood_type ?: 'Not specified'],
            ['Birth Date:', $patient->birth_date ?: 'Not specified'],
            ['Height:', ($patient->height ? $patient->height . ' cm' : 'Not specified')],
            ['Weight:', ($patient->weight ? $patient->weight . ' kg' : 'Not specified')]
        ];
        
        // Right column data
        $rightColumnData = [
            ['Contact:', $patient->contact_number ?: 'Not provided'],
            ['PhilHealth #:', $patient->philhealth_number ?: 'Not provided'],
            ['Street:', $patient->street ?: 'Not specified'],
            ['Address:', $patient->address ?: 'Not specified'],
            ['Date Consulted:', $patient->date_consulted ?: 'Not specified'],
            ['Status:', $patient->status ?: 'Not specified'],
            ['', ''] // Empty for alignment
        ];
        
        // Print columns side by side
        $leftColX = self::LEFT_MARGIN;
        $rightColX = self::LEFT_MARGIN + 90;
        
        for ($i = 0; $i < count($leftColumnData); $i++) {
            $rowY = $currentY + ($i * $lineHeight);
            
            // Left column
            if (!empty($leftColumnData[$i][0])) {
                $pdf->SetFont('Helvetica', 'B', 10);
                $pdf->SetXY($leftColX, $rowY);
                $pdf->Cell($labelWidth, $lineHeight, $leftColumnData[$i][0], 0, 0, 'L');
                
                $pdf->SetFont('Helvetica', '', 10);
                $pdf->SetXY($leftColX + $labelWidth, $rowY);
                $pdf->Cell($valueWidth, $lineHeight, $leftColumnData[$i][1], 0, 0, 'L');
            }
            
            // Right column
            if (!empty($rightColumnData[$i][0])) {
                $pdf->SetFont('Helvetica', 'B', 10);
                $pdf->SetXY($rightColX, $rowY);
                $pdf->Cell($labelWidth, $lineHeight, $rightColumnData[$i][0], 0, 0, 'L');
                
                $pdf->SetFont('Helvetica', '', 10);
                $pdf->SetXY($rightColX + $labelWidth, $rowY);
                $pdf->Cell($valueWidth, $lineHeight, $rightColumnData[$i][1], 0, 0, 'L');
            }
        }
        
        $currentY += (count($leftColumnData) * $lineHeight) + 8;
        
        // Full width fields
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->SetXY(self::LEFT_MARGIN, $currentY);
        $pdf->Cell(30, $lineHeight, 'Visit Purpose:', 0, 0, 'L');
        
        $pdf->SetFont('Helvetica', '', 10);
        // Decode if it's JSON
        $visitPurpose = $patient->visit_purpose;

        if (is_string($visitPurpose) && $this->isJson($visitPurpose)) {
            $decoded = json_decode($visitPurpose, true);
            $visitPurpose = is_array($decoded) ? implode(', ', $decoded) : $visitPurpose;
        }

        // Add "other purpose" if exists
        $visitPurposeText = $visitPurpose . ($patient->other_purpose ? " ({$patient->other_purpose})" : "");

        $pdf->SetXY(self::LEFT_MARGIN + 30, $currentY);
        $pdf->MultiCell(self::CONTENT_WIDTH - 30, $lineHeight, $visitPurposeText, 0, 'L');
        
        $currentY = $pdf->GetY() + 2;
        
        // Medical diagnosis
        // ✅ Get all diagnoses from pivot table
        $diagnosisList = $patient->diagnoses->pluck('diagnosis_name')->implode(', ');

        // ✅ Include other diagnosis if provided
        if ($patient->other_diagnosis) {
            $diagnosisList .= ($diagnosisList ? ', ' : '') . $patient->other_diagnosis;
        }

        
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->SetXY(self::LEFT_MARGIN, $currentY);
        $pdf->Cell(35, $lineHeight, 'Medical Diagnosis:', 0, 0, 'L');
        
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->SetXY(self::LEFT_MARGIN + 35, $currentY);
        $pdf->MultiCell(self::CONTENT_WIDTH - 35, $lineHeight, $diagnosisList ?: 'Not specified', 0, 'L');
        
        $currentY = $pdf->GetY() + 2;
        
        // Given medicine
        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->SetXY(self::LEFT_MARGIN, $currentY);
        $pdf->Cell(30, $lineHeight, 'Given Medicine:', 0, 0, 'L');
        
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->SetXY(self::LEFT_MARGIN + 30, $currentY);
        $pdf->MultiCell(self::CONTENT_WIDTH - 30, $lineHeight, $patient->given_medicine ?: 'None prescribed', 0, 'L');
        
        return $pdf->GetY() + 10;
    }
    
    private function addMedicalHistorySection($pdf, $history, $startY, $tplIdx)
    {
        // Check if we need space for the header
        if ($startY > (self::PAGE_HEIGHT - self::FOOTER_HEIGHT - 30)) {
            $startY = $this->addNewPage($pdf, $tplIdx, false);
        }
        
        // Medical History Header
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->SetXY(self::LEFT_MARGIN, $startY);
        $pdf->Cell(self::CONTENT_WIDTH, 8, 'MEDICAL HISTORY', 0, 1, 'L');
        
        // Decorative line
        $pdf->SetLineWidth(0.8);
        $pdf->SetDrawColor(50, 50, 50);
        $pdf->Line(self::LEFT_MARGIN, $startY + 10, self::LEFT_MARGIN + self::CONTENT_WIDTH, $startY + 10);
        
        $currentY = $startY + 18;
        
        if ($history->isEmpty()) {
            $pdf->SetFont('Helvetica', 'I', 11);
            $pdf->SetXY(self::LEFT_MARGIN, $currentY);
            $pdf->Cell(self::CONTENT_WIDTH, 8, 'No previous medical history recorded.', 0, 1, 'L');
            return;
        }
        
        foreach ($history as $index => $record) {
            $recordHeight = 35; // Estimated height for each record
            
            // Check if we need a new page
            if ($currentY + $recordHeight > (self::PAGE_HEIGHT - self::FOOTER_HEIGHT)) {
                $currentY = $this->addNewPage($pdf, $tplIdx, false);
                
                // Re-add section header on new page
                $pdf->SetFont('Helvetica', 'B', 12);
                $pdf->SetXY(self::LEFT_MARGIN, $currentY);
                $pdf->Cell(self::CONTENT_WIDTH, 8, 'MEDICAL HISTORY (Continued)', 0, 1, 'L');
                $pdf->SetLineWidth(0.8);
                $pdf->Line(self::LEFT_MARGIN, $currentY + 10, self::LEFT_MARGIN + self::CONTENT_WIDTH, $currentY + 10);
                $currentY += 18;
            }
            
            // Record header
            $pdf->SetFont('Helvetica', 'B', 11);
            $pdf->SetFillColor(245, 245, 245);
            $pdf->SetXY(self::LEFT_MARGIN, $currentY);
            $pdf->Cell(self::CONTENT_WIDTH, 7, "Visit #" . ($index + 1) . " - " . ($record->consultation_date ?: 'Date not recorded'), 1, 1, 'L', true);
            
            $currentY += 7;
            
            // Record details in a bordered box
            $pdf->SetFont('Helvetica', '', 10);
            $pdf->SetFillColor(255, 255, 255);
            
            $boxHeight = 25;
            $pdf->SetDrawColor(200, 200, 200);
            $pdf->Rect(self::LEFT_MARGIN, $currentY, self::CONTENT_WIDTH, $boxHeight);
            
            // Content inside the box with proper spacing
            $contentY = $currentY + 3;
            $lineHeight = 5;
            
            // Purpose
            $pdf->SetFont('Helvetica', 'B', 9);
            $pdf->SetXY(self::LEFT_MARGIN + 3, $contentY);
            $pdf->Cell(25, $lineHeight, 'Purpose:', 0, 0, 'L');
            $pdf->SetFont('Helvetica', '', 9);
            $pdf->Cell(0, $lineHeight, $record->visit_purpose ?: 'Not specified', 0, 1, 'L');
            
            // Diagnosis
            $contentY += $lineHeight;
            $pdf->SetFont('Helvetica', 'B', 9);
            $pdf->SetXY(self::LEFT_MARGIN + 3, $contentY);
            $pdf->Cell(25, $lineHeight, 'Diagnosis:', 0, 0, 'L');
            $pdf->SetFont('Helvetica', '', 9);
            $pdf->Cell(0, $lineHeight, $record->medical_diagnosis ?: 'Not specified', 0, 1, 'L');
            
            // Medicine
            $contentY += $lineHeight;
            $pdf->SetFont('Helvetica', 'B', 9);
            $pdf->SetXY(self::LEFT_MARGIN + 3, $contentY);
            $pdf->Cell(25, $lineHeight, 'Medicine:', 0, 0, 'L');
            $pdf->SetFont('Helvetica', '', 9);
            $pdf->Cell(0, $lineHeight, $record->given_medicine ?: 'None prescribed', 0, 1, 'L');
            
            // Status and Staff
            $contentY += $lineHeight;
            $pdf->SetFont('Helvetica', 'B', 9);
            $pdf->SetXY(self::LEFT_MARGIN + 3, $contentY);
            $pdf->Cell(20, $lineHeight, 'Status:', 0, 0, 'L');
            $pdf->SetFont('Helvetica', '', 9);
            $pdf->Cell(50, $lineHeight, $record->status ?: 'Not specified', 0, 0, 'L');
            
            $pdf->SetFont('Helvetica', 'B', 9);
            $pdf->Cell(15, $lineHeight, 'Staff:', 0, 0, 'L');
            $pdf->SetFont('Helvetica', '', 9);
            $pdf->Cell(0, $lineHeight, $record->user ? $record->user->name : 'Not recorded', 0, 1, 'L');
            
            $currentY += $boxHeight + 8;
        }
    }
    
    private function addProfessionalFooter($pdf)
{
    $footerY = self::PAGE_HEIGHT - 45;

    // Logged-in user
    $currentUser = auth()->user();
    $notedByName = $currentUser ? $currentUser->name : '_______________________';
    $notedByRole = $currentUser ? ucfirst($currentUser->role) : 'System User';

    // Prepared by (left)
    $pdf->SetLineWidth(0.3);
    $pdf->Line(self::LEFT_MARGIN, $footerY - 5, self::LEFT_MARGIN + self::CONTENT_WIDTH, $footerY - 5);

    $pdf->SetFont('Helvetica', '', 11);
    $pdf->SetXY(self::LEFT_MARGIN + 15, $footerY);
    $pdf->Cell(80, 6, 'Printed by:'. $notedByRole , 0, 1, 'L');

    $pdf->SetXY(self::LEFT_MARGIN + 15, $footerY + 8);
    $pdf->Cell(80, 6, '_________________________', 0, 1, 'L');

    $pdf->SetFont('Helvetica', '', 9);
    $pdf->SetXY(self::LEFT_MARGIN + 15, $footerY + 14);
    $pdf->Cell(80, 6, 'Health Center Staff', 0, 1, 'L');

    $pdf->SetXY(self::LEFT_MARGIN + 15, $footerY + 18);
    $pdf->Cell(80, 6, 'Signature over Printed Name', 0, 1, 'L');

    // Noted by (right)
    // Noted by section (right side)
$pdf->SetFont('Helvetica', '', 11);
$pdf->SetXY(self::LEFT_MARGIN + self::CONTENT_WIDTH - 95, $footerY);
$pdf->Cell(80, 6, 'Noted by: ', 0, 0, 'R');

// Line (for signature)
$pdf->SetXY(self::LEFT_MARGIN + self::CONTENT_WIDTH - 95, $footerY + 8);
$pdf->Cell(80, 6, '_________________________', 0, 0, 'R');

// Title under the line
$pdf->SetFont('Helvetica', '', 9);
$pdf->SetXY(self::LEFT_MARGIN + self::CONTENT_WIDTH - 95, $footerY + 14);
$pdf->Cell(80, 6, 'Head of Facility', 0, 0, 'R');

// Signature note
$pdf->SetXY(self::LEFT_MARGIN + self::CONTENT_WIDTH - 95, $footerY + 18);
$pdf->Cell(80, 6, 'Signature over Printed Name', 0, 0, 'R');

}

    public function printAllPatients(Request $request)
    {
        // Initialize PDF
        $pdf = new Fpdi();
        $templatePath = storage_path('app/templates/health_records_template.pdf');
        $pdf->setSourceFile($templatePath);
        $tplIdx = $pdf->importPage(1);

        $this->addNewPage($pdf, $tplIdx);

        // Title
        $pdf->SetFont('Helvetica', 'B', 16);
        $pdf->SetXY(self::LEFT_MARGIN, 50);
        $pdf->Cell(self::CONTENT_WIDTH, 10, 'PATIENT HEALTH RECORDS SUMMARY', 0, 1, 'C');

        // Decorative line
        $pdf->SetLineWidth(1.0);
        $pdf->SetDrawColor(50, 50, 50);
        $pdf->Line(self::LEFT_MARGIN + 20, 62, self::LEFT_MARGIN + self::CONTENT_WIDTH - 20, 62);

        // Table setup
        $startY = 75;
        $currentY = $startY;
        $colWidths = [8, 16, 18, 18, 17, 12, 34, 30, 48]; 
        $headers = ['ID', 'Date', 'First Name', 'Last Name', 'Age', 'Gender', 'Visit Purpose', 'Diagnosis', 'Status'];


        // Draw table header
        $this->drawTableHeader($pdf, $currentY, $colWidths, $headers);
        $currentY += 12;

        // 🔹 Get filter values from request
        $lastName = $request->input('last_name');
        $gender = $request->input('gender');
        $visitPurpose = $request->input('visit_purpose');
        $medicalDiagnosis = $request->input('medical_diagnosis');

        // 🔹 Start query with latest records
        $latestRecordsQuery = HistoryRecord::select('history_records.*')
            ->join(DB::raw('(SELECT health_record_id, MAX(created_at) as latest_date 
                            FROM history_records 
                            GROUP BY health_record_id) as sub'), function ($join) {
                $join->on('history_records.health_record_id', '=', 'sub.health_record_id')
                    ->on('history_records.created_at', '=', 'sub.latest_date');
            })
            ->with(['healthRecord' => function ($q) {
                $q->withTrashed(); // Include archived patients
            }])
            ->orderBy('consultation_date', 'desc');

        // 🔹 Apply filters dynamically
        $latestRecordsQuery->whereHas('healthRecord', function ($query) use ($lastName, $gender, $visitPurpose) {
            if (!empty($lastName)) {
                $query->where('last_name', 'LIKE', "%{$lastName}%");
            }
            if (!empty($gender)) {
                $query->where('gender', $gender);
            }
            if (!empty($visitPurpose)) {
                $query->where('visit_purpose', 'LIKE', "%{$visitPurpose}%");
            }
        });

        // Filter by diagnosis using history_records
        if (!empty($medicalDiagnosis)) {
            $latestRecordsQuery->where('medical_diagnosis', 'LIKE', "%{$medicalDiagnosis}%");
        }

        // 🔹 Fetch filtered results
        $latestRecords = $latestRecordsQuery->get();

        // 🔹 Check if no data found
        if ($latestRecords->isEmpty()) {
            $pdf->SetFont('Helvetica', 'I', 12);
            $pdf->SetXY(self::LEFT_MARGIN, 80);
            $pdf->Cell(self::CONTENT_WIDTH, 10, 'No patient records found for the selected filters.', 0, 1, 'C');

            return response($pdf->Output('S'))
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="all_patients_records.pdf"');
        }

        // 🔹 Draw table rows
        $rowCount = 0;
        foreach ($latestRecords as $record) {
            $patient = $record->healthRecord;
            if (!$patient) continue;

            // Check for new page
            if ($currentY > (self::PAGE_HEIGHT - self::FOOTER_HEIGHT - 15)) {
                $currentY = $this->addNewPage($pdf, $tplIdx, false);
                $this->drawTableHeader($pdf, $currentY, $colWidths, $headers);
                $currentY += 12;
            }

            // Draw row
            $this->drawTableRow($pdf, $currentY, $colWidths, $patient, $record, $rowCount);
            $currentY += 10;
            $rowCount++;
        }

        // Footer
        $this->addProfessionalFooter($pdf);

        return response($pdf->Output('S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="all_patients_records.pdf"');
    }

    private function drawTableHeader($pdf, $y, $colWidths, $headers)
    {
        $pdf->SetFont('Helvetica', 'B', 9);
        $pdf->SetFillColor(230, 230, 230);
        $pdf->SetDrawColor(100, 100, 100);
        $pdf->SetTextColor(0, 0, 0);
        
        $x = self::LEFT_MARGIN;
        foreach ($headers as $index => $header) {
            $pdf->SetXY($x, $y);
            $pdf->Cell($colWidths[$index], 10, $header, 1, 0, 'C', true);
            $x += $colWidths[$index];
        }
    }
    
    private function drawTableRow($pdf, $y, $colWidths, $patient, $record, $rowCount)
    {
        $pdf->SetFont('Helvetica', '', 8);
        $fillColor = ($rowCount % 2 == 0) ? [255, 255, 255] : [248, 248, 248];
        $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
        $pdf->SetDrawColor(200, 200, 200);

        // Calculate age
        $age = $this->formatFullAge($patient->birth_date);

        // Format visit purpose
        $visitPurpose = $record->visit_purpose;

        if (is_string($visitPurpose) && $this->isJson($visitPurpose)) {
            $decoded = json_decode($visitPurpose, true);
            $visitPurpose = is_array($decoded) ? implode(', ', $decoded) : $visitPurpose;
        }

        $visitPurpose = $this->truncateText($visitPurpose, 25);
        
        // Format diagnosis
        $diagnosis = $this->truncateText($record->medical_diagnosis ?: 'Not specified', 45);

        $status = $this->truncateText($record->status ?: 'Not specified', 20);

        $rowData = [
            $patient->id,
            $record->consultation_date ? date('Y-m-d', strtotime($record->consultation_date)) : 'N/A',
            $this->truncateText($patient->first_name, 15),
            $this->truncateText($patient->last_name, 15),
            $age,
            substr($patient->gender, 0, 1),
            $visitPurpose,
            $diagnosis,
            $status
        ];

        
        $x = self::LEFT_MARGIN;
        foreach ($rowData as $index => $data) {
            $pdf->SetXY($x, $y);
            $pdf->Cell($colWidths[$index], 8, $data, 1, 0, 'C', true);
            $x += $colWidths[$index];
        }
    }
    
    private function truncateText($text, $maxLength)
    {
        return strlen($text) > $maxLength ? substr($text, 0, $maxLength - 3) . '...' : $text;
    }

    public function printReports(Request $request)
    {
        $pdf = new Fpdi();
        $templatePath = storage_path('app/templates/health_records_template.pdf');
        $pdf->setSourceFile($templatePath);
        $tplIdx = $pdf->importPage(1);
        
        $this->addNewPage($pdf, $tplIdx);

        // Professional Title
        $pdf->SetFont('Helvetica', 'B', 16);
        $pdf->SetXY(self::LEFT_MARGIN, 50);
        $pdf->Cell(self::CONTENT_WIDTH, 10, 'DATA VISUALIZATION REPORTS', 0, 1, 'C');
        
        // Decorative line
        $pdf->SetLineWidth(1.0);
        $pdf->SetDrawColor(50, 50, 50);
        $pdf->Line(self::LEFT_MARGIN + 20, 62, self::LEFT_MARGIN + self::CONTENT_WIDTH - 20, 62);

        // Get all analytics data
        // Get Cases per Street data (counting unique patients, not multiple visits)
        $casesPerStreet = DB::table('health_records')
            ->select('street', DB::raw('COUNT(DISTINCT health_records.id) as total'))
            ->whereNotNull('street')
            ->where('street', '!=', '')
            ->groupBy('street')
            ->orderByDesc('total')
            ->get();

        // Get Gender Distribution data (unique patients only)
        $genderTotals = DB::table('health_records')
            ->select('gender', DB::raw('COUNT(DISTINCT id) as total'))
            ->whereNotNull('gender')
            ->groupBy('gender')
            ->pluck('total', 'gender')
            ->toArray();

        // Get Age Group data (unique patients only)
$ageGroupsTotals = DB::table('health_records')
    ->selectRaw("
        CASE 
            WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 0 AND 14 THEN '0-14'
            WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 15 AND 18 THEN '15-18'
            WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 19 AND 59 THEN '19-59'
            WHEN TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) >= 60 THEN '60+'
            ELSE 'Unknown'
        END as age_group,
        COUNT(DISTINCT id) as total
    ")
    ->whereNotNull('birth_date')
    ->groupBy('age_group')
    ->pluck('total', 'age_group')
    ->toArray();



        // Keep diagnosis query as is since it should count cases/visits, not unique patients
        $diagnosisBreakdown = DB::table('history_records')
            ->select('medical_diagnosis', DB::raw('COUNT(*) as total'))
            ->whereNotNull('medical_diagnosis')
            ->where('medical_diagnosis', '!=', '')
            ->groupBy('medical_diagnosis')
            ->orderByDesc('total')
            ->limit(15)
            ->pluck('total', 'medical_diagnosis')
            ->toArray();

        $diagnosisByStreet = HealthRecord::with('diagnoses')
            ->whereNotNull('street')
            ->where('street', '!=', '')
            ->get()
            ->flatMap(function ($record) {
                return $record->diagnoses->map(function ($diagnosis) use ($record) {
                    return [
                        'street' => $record->street,
                        'diagnosis_name' => $diagnosis->diagnosis_name,
                    ];
                });
            })
            ->groupBy(function ($item) {
                return $item['street'] . '|' . $item['diagnosis_name'];
            })
            ->map(function ($group) {
                $first = $group->first();
                return (object) [
                    'street' => $first['street'],
                    'diagnosis_name' => $first['diagnosis_name'],
                    'total' => $group->count()
                ];
            })
            ->sortBy('street')
            ->sortByDesc('total');

        $charts = $request->input('charts', []);
        $currentY = 75;
        $chartHeight = 100;
        $chartSpacing = 15;

        foreach ($charts as $index => $chartBase64) {
            // Check if chart fits on current page
            if ($currentY + $chartHeight + 60 > (self::PAGE_HEIGHT - self::FOOTER_HEIGHT)) {
                $currentY = $this->addNewPage($pdf, $tplIdx, false);
            }

            // Chart title
            $pdf->SetFont('Helvetica', 'B', 12);
            $pdf->SetXY(self::LEFT_MARGIN, $currentY);
            
            $chartTitles = [
                'Gender Distribution',
                'Age Group Distribution',
                'Medical Diagnosis Distribution',
                'Cases by Diagnosis'
            ];
            
            $chartTitle = $chartTitles[$index] ?? 'Chart ' . ($index + 1);
            $pdf->Cell(self::CONTENT_WIDTH, 8, $chartTitle, 0, 1, 'C');
            $currentY += 10;

            // Process and insert chart
            $chartData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $chartBase64));
            $tmpFile = tempnam(sys_get_temp_dir(), 'chart') . '.png';
            file_put_contents($tmpFile, $chartData);

            // Chart border
            $pdf->SetDrawColor(150, 150, 150);
            $pdf->SetLineWidth(0.5);
            $pdf->Rect(self::LEFT_MARGIN, $currentY, self::CONTENT_WIDTH, $chartHeight);
            
            // Insert chart with padding
            $pdf->Image($tmpFile, self::LEFT_MARGIN + 2, $currentY + 2, self::CONTENT_WIDTH - 4, $chartHeight - 4);
            unlink($tmpFile);

            $currentY += $chartHeight + 10;

            // Add analysis below each chart
            $pdf->SetFont('Helvetica', 'B', 11);
            $pdf->SetXY(self::LEFT_MARGIN, $currentY);
            
            switch($index) {
                case 0: // Gender Distribution
                    $pdf->Cell(self::CONTENT_WIDTH, 6, 'Gender Distribution Analysis', 0, 1, 'L');
                    $currentY += 8;
                    
                    $totalGenderCases = array_sum($genderTotals);
                    $maleCount = $genderTotals['Male'] ?? 0;
                    $femaleCount = $genderTotals['Female'] ?? 0;
                    $malePercentage = $totalGenderCases > 0 ? round(($maleCount / $totalGenderCases) * 100, 1) : 0;
                    $femalePercentage = $totalGenderCases > 0 ? round(($femaleCount / $totalGenderCases) * 100, 1) : 0;
                    $dominantGender = $maleCount > $femaleCount ? 'Male' : 'Female';
                    $dominantCount = max($maleCount, $femaleCount);
                    $dominantPercentage = $dominantGender === 'Male' ? $malePercentage : $femalePercentage;
                    
                    $pdf->SetFont('Helvetica', '', 10);
                    $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
                    $pdf->MultiCell(self::CONTENT_WIDTH - 5, 5, 
                        "Gender Breakdown: {$totalGenderCases} total patients across 2 genders", 0, 'L');
                    $currentY = $pdf->GetY();
                    
                    $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
                    $pdf->MultiCell(self::CONTENT_WIDTH - 5, 5, 
                        "Highest: {$dominantGender} ({$dominantCount} patients - {$dominantPercentage}%)", 0, 'L');
                    $currentY = $pdf->GetY();
                    break;

                case 1: // Age Group Distribution
                    $pdf->Cell(self::CONTENT_WIDTH, 6, 'Age Group Distribution Analysis', 0, 1, 'L');
                    $currentY += 8;
                    
                    $totalAgeGroupCases = array_sum($ageGroupsTotals);
                    $ageGroupCount = count($ageGroupsTotals);
                    $topAgeGroup = collect($ageGroupsTotals)->sortDesc()->keys()->first();
                    $topAgeGroupCount = collect($ageGroupsTotals)->max();
                    
                    $pdf->SetFont('Helvetica', '', 10);
                    $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
                    $pdf->MultiCell(self::CONTENT_WIDTH - 5, 5, 
                        "Age Group Breakdown: {$totalAgeGroupCases} total patients across {$ageGroupCount} age groups", 0, 'L');
                    $currentY = $pdf->GetY();
                    
                    if ($topAgeGroup) {
                        $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
                        $pdf->MultiCell(self::CONTENT_WIDTH - 5, 5, 
                            "Highest: {$topAgeGroup} years ({$topAgeGroupCount} patients)", 0, 'L');
                        $currentY = $pdf->GetY();
                    }
                    break;

                case 2: // Medical Diagnosis Distribution
                    if ($diagnosisByStreet->count() > 0) {
                        $pdf->SetFont('Helvetica', 'B', 10);
                        $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
                        $pdf->Cell(self::CONTENT_WIDTH - 5, 6, 'Medical Diagnosis Breakdown:', 0, 1, 'L');
                        $currentY += 8;

                        // Table header
                        $pdf->SetFont('Helvetica', 'B', 9);
                        $pdf->SetFillColor(230, 230, 230);
                        $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
                        $pdf->Cell(60, 6, 'Street Name', 1, 0, 'C', true);
                        $pdf->Cell(80, 6, 'Medical Diagnosis', 1, 0, 'C', true);
                        $pdf->Cell(30, 6, 'Cases', 1, 1, 'C', true);
                        $currentY += 6;

                        // Table rows
                        $pdf->SetFont('Helvetica', '', 8);
                        $rowCount = 0;
                        foreach ($diagnosisByStreet as $item) {
                            // Check if we need a new page
                            if ($currentY > (self::PAGE_HEIGHT - self::FOOTER_HEIGHT - 15)) {
                                $currentY = $this->addNewPage($pdf, $tplIdx, false);
                        
                                // Re-add table header
                                $pdf->SetFont('Helvetica', 'B', 9);
                                $pdf->SetFillColor(230, 230, 230);
                                $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
                                $pdf->Cell(60, 6, 'Street Name', 1, 0, 'C', true);
                                $pdf->Cell(80, 6, 'Medical Diagnosis', 1, 0, 'C', true);
                                $pdf->Cell(30, 6, 'Cases', 1, 1, 'C', true);
                                $currentY += 6;
                                $pdf->SetFont('Helvetica', '', 8);
                            }
                    
                            $fillColor = ($rowCount % 2 == 0) ? [255, 255, 255] : [248, 248, 248];
                            $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
                    
                            $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
                            $pdf->Cell(60, 5, $this->truncateText($item->street, 25), 1, 0, 'L', true);
                            $pdf->Cell(80, 5, $this->truncateText($item->diagnosis_name, 35), 1, 0, 'L', true);
                            $pdf->Cell(30, 5, $item->total, 1, 1, 'C', true);
                            $currentY += 5;
                            $rowCount++;
                        }
                    }
                    break;
                    
                case 3: // Diagnosis Distribution
                    $pdf->Cell(self::CONTENT_WIDTH, 6, 'Diagnosis Distribution Analysis', 0, 1, 'L');
                    $currentY += 8;
                    
                    $totalDiagnosisCases = array_sum($diagnosisBreakdown);
                    $diagnosisCount = count($diagnosisBreakdown);
                    $topDiagnosis = collect($diagnosisBreakdown)->sortDesc()->keys()->first();
                    $topDiagnosisCount = collect($diagnosisBreakdown)->max();
                    
                    $pdf->SetFont('Helvetica', '', 10);
                    $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
                    $pdf->MultiCell(self::CONTENT_WIDTH - 5, 5, 
                        "Diagnosis Breakdown: {$totalDiagnosisCases} total cases across {$diagnosisCount} different diagnoses", 0, 'L');
                    $currentY = $pdf->GetY();
                    
                    if ($topDiagnosis) {
                        $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
                        $pdf->MultiCell(self::CONTENT_WIDTH - 5, 5, 
                            "Most Common: {$topDiagnosis} ({$topDiagnosisCount} cases)", 0, 'L');
                        $currentY = $pdf->GetY();
                    }
                    break;
            }
            
            $currentY += $chartSpacing;
        }

        // Add Cases per Street detailed table at the end
        if ($casesPerStreet->count() > 0) {
            // Check if we need a new page for the table
            if ($currentY + 100 > (self::PAGE_HEIGHT - self::FOOTER_HEIGHT)) {
                $currentY = $this->addNewPage($pdf, $tplIdx, false);
            }

            $pdf->SetFont('Helvetica', 'B', 12);
            $pdf->SetXY(self::LEFT_MARGIN, $currentY);
            $pdf->Cell(self::CONTENT_WIDTH, 6, 'Cases per Street - Detailed Breakdown (Per Individual)', 0, 1, 'L');
            $currentY += 10;

            // Table header
            $pdf->SetFont('Helvetica', 'B', 10);
            $pdf->SetFillColor(230, 230, 230);
            $pdf->SetXY(self::LEFT_MARGIN, $currentY);
            $pdf->Cell(120, 8, 'Street Name', 1, 0, 'C', true);
            $pdf->Cell(70, 8, 'Number of Cases', 1, 1, 'C', true);
            $currentY += 8;

            // Table rows
            $pdf->SetFont('Helvetica', '', 9);
            $rowCount = 0;
            foreach ($casesPerStreet as $street) {
                // Check if we need a new page
                if ($currentY > (self::PAGE_HEIGHT - self::FOOTER_HEIGHT - 20)) {
                    $currentY = $this->addNewPage($pdf, $tplIdx, false);
            
                    // Re-add table header
                    $pdf->SetFont('Helvetica', 'B', 10);
                    $pdf->SetFillColor(230, 230, 230);
                    $pdf->SetXY(self::LEFT_MARGIN, $currentY);
                    $pdf->Cell(120, 8, 'Street Name', 1, 0, 'C', true);
                    $pdf->Cell(70, 8, 'Number of Cases', 1, 1, 'C', true);
                    $currentY += 8;
                    $pdf->SetFont('Helvetica', '', 9);
                }
        
                $fillColor = ($rowCount % 2 == 0) ? [255, 255, 255] : [248, 248, 248];
                $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
        
                $pdf->SetXY(self::LEFT_MARGIN, $currentY);
                $pdf->Cell(120, 6, $street->street, 1, 0, 'L', true);
                $pdf->Cell(70, 6, $street->total, 1, 1, 'C', true);
                $currentY += 6;
                $rowCount++;
            }
            
            // Cases per Street Analysis
            $currentY += 10;
            
            $totalStreetCases = $casesPerStreet->sum('total');
            $streetCount = $casesPerStreet->count();
            $topStreet = $casesPerStreet->first();
            
            $pdf->SetFont('Helvetica', 'B', 11);
            $pdf->SetXY(self::LEFT_MARGIN, $currentY);
            $pdf->Cell(self::CONTENT_WIDTH, 6, 'Cases per Street Analysis', 0, 1, 'L');
            $currentY += 8;
            
            $pdf->SetFont('Helvetica', '', 10);
            $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
            $pdf->MultiCell(self::CONTENT_WIDTH - 5, 5, 
                "Street Distribution: {$totalStreetCases} total cases across {$streetCount} streets", 0, 'L');
            $currentY = $pdf->GetY();
            
            if ($topStreet) {
                $pdf->SetXY(self::LEFT_MARGIN + 5, $currentY);
                $pdf->MultiCell(self::CONTENT_WIDTH - 5, 5, 
                    "Highest: {$topStreet->street} ({$topStreet->total} cases)", 0, 'L');
                $currentY = $pdf->GetY();
            }
        }

        // Add properly aligned footer
        $this->addProfessionalFooter($pdf);

        return response($pdf->Output('S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="health_center_reports.pdf"');
    }
}
