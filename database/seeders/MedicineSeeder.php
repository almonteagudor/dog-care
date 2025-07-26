<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->data() as $item) {
            $medicine = new Medicine();

            $medicine->name = $item['name'];
            $medicine->description = $item['description'];

            $medicine->save();
        }
    }

    private function data(): array
    {
        return [
            [
                'id' => '1154c350-2960-4bb5-b690-7ee7f49752c6',
                'name' => 'Carprofeno',
                'description' => 'Antiinflamatorio no esteroideo (AINE) utilizado para aliviar el dolor y la inflamación en perros con artritis o después de cirugías',
            ],
            [
                'id' => '37d05600-8352-4198-abcf-73e3f13cec75',
                'name' => 'Firocoxib',
                'description' => 'AINE utilizado para tratar el dolor y la inflamación asociados con la osteoartritis en perros',
            ],
            [
                'id' => '78c69d57-76d2-46dd-b21e-552aa166b0b7',
                'name' => 'Amoxicilina',
                'description' => 'Antibiótico de amplio espectro utilizado para tratar infecciones bacterianas en perros, como infecciones de piel, vías respiratorias y urinarias',
            ],
            [
                'id' => '7c3fadb6-fbb2-439a-9b69-bcbd52e52dc8',
                'name' => 'Metronidazol',
                'description' => 'Antibiótico y antiparasitario usado para tratar infecciones gastrointestinales, como giardiasis y colitis en perros',
            ],
            [
                'id' => 'a5ef603e-493b-4c87-b14c-cc038cfa156b',
                'name' => 'Prednisolona',
                'description' => 'Corticosteroide utilizado para tratar afecciones inflamatorias y alérgicas en perros',
            ],
            [
                'id' => 'a96864e0-e517-4e5d-a0d0-784849d90a59',
                'name' => 'Fenobarbital',
                'description' => 'Medicamento anticonvulsivo utilizado en el tratamiento de la epilepsia en perros',
            ],
            [
                'id' => 'bd95bd7b-03aa-4927-a7ca-67dcea0ca8f2',
                'name' => 'Ivermectina',
                'description' => 'Antiparasitario utilizado para el tratamiento y prevención de parásitos internos y externos, como gusanos del corazón y sarna',
            ],
            [
                'id' => 'd6576c01-541f-4f3e-b582-6ef70cfa1b4f',
                'name' => 'Apoquel (Oclacitinib)',
                'description' => 'Medicamento para el tratamiento del picor y las alergias en perros, especialmente en casos de dermatitis atópica',
            ],
            [
                'id' => 'f16d4bb5-be6a-4473-be7c-170b36275e0a',
                'name' => 'Gabapentina',
                'description' => 'Medicamento utilizado para tratar el dolor neuropático y como coadyuvante en el tratamiento de convulsiones en perros',
            ],
            [
                'id' => 'f9ba5689-5062-4512-8088-e1b3ffa3c109',
                'name' => 'Maropitant (Cerenia)',
                'description' => 'Antiemético utilizado para prevenir y tratar los vómitos en perros, especialmente en casos de mareo por movimiento o gastritis',
            ],
        ];
    }
}
