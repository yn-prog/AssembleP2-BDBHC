<?php

namespace Database\Seeders;

use App\Models\Diagnosis;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $allDiagnoses = [
            "Dengue", "Flu", "Chickenpox", "Diarrhea", "Headache", "Fever", "Hypertension", "Essentially Well",
            "Hypertension; CKD", "URTI", "Skin Infection", "Infected Wound", "Acid Peptic Ulcer Disease", "PTB Suspect",
            "UTI", "Eye Irritation", "ANP", "PTB", "Carbuncle", "Varicella", "Gout", "Cellulitis", "Hypersensitivity",
            "Molluscum Contagiosum", "Lactose Intolerance", "Allergic Rhinitis", "PCAP-A", "Insect Bite",
            "Systemic Viral Illness", "Allergic Cough", "Maxillary Abscess", "URTI Viral", "Fungal Infection",
            "Acute Bronchitis", "Cough and colds", "Oral Stomatitis", "Gastritis", "Hyperlipidemia", "Cat bite",
            "Acute tonsillopharyngitis", "Osteoarthritis", "Impetigo", "Bronchial asthma", "Allergy", "Stye",
            "Threatened Abortion", "Sprain", "Dyslipidemia", "Underweight", "Inguinal Hernia", "Otitis Externa",
            "Anemia", "Bronchitis", "Colds", "Tinea Pudis", "Musculoskeletal strain", "Pneumonia", "Vaginitis",
            "Conjunctivitis", "Musculoskeletal pain", "COVID-19", "Internal Hemorrhoids", "Atopic Dermatitis",
            "Lacerated Wound", "Diabetes", "Milliara Rubra", "Overfatigue", "Measles", "Gastric Ulcer", "Boil",
            "Contact Dermatitis", "Insomnia", "Diabetes Type 2", "Tension Headache", "Acute Gastritis",
            "Peripheral Neuropathy", "Acute Upper Respiratory Infection", "COVID-19 Suspect", "Breast Mass",
            "Multiple Abrasion", "Arthritis", "Tendon Cyst", "AURI", "Acute Gastroenteritis", "Muscle Pain",
            "Vehicular Accident", "External nodules", "Loss of consciousness", "Chondrodermatitis", "Fall",
            "Mild Stroke", "Parasitism", "Mastalgia", "HFMD", "Roseola Infantum", "Goiter", "Intestinal Parasites",
            "Lower back pain", "Oral thrush",
        ];

        $dentistDiagnoses = ["Dental Check-up", "Oral Stomatitis", "Tooth Extraction", "Maxillary Abscess"];
        $midwifeDiagnoses = ["Prenatal Check", "Abortion", "Vaginitis"];

        $exclusiveDiagnoses = array_merge($dentistDiagnoses, $midwifeDiagnoses);

        // Assign general diagnoses to physician and nurse
        $generalDiagnoses = collect($allDiagnoses)
            ->diff($exclusiveDiagnoses)
            ->values()
            ->all();

        foreach ($generalDiagnoses as $name) {
            Diagnosis::updateOrCreate(
                ['diagnosis_name' => $name],
                ['visible_to_roles' => ['physician', 'nurse','admin']]
            );
        }

        // Dentist-only diagnoses
        foreach ($dentistDiagnoses as $name) {
            Diagnosis::updateOrCreate(
                ['diagnosis_name' => $name],
                ['visible_to_roles' => ['dentist']]
            );
        }

        // Midwife-only diagnoses
        foreach ($midwifeDiagnoses as $name) {
            Diagnosis::updateOrCreate(
                ['diagnosis_name' => $name],
                ['visible_to_roles' => ['midwife']]
            );
        }
    }
}
