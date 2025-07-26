<?php

namespace Database\Seeders;

use App\Models\Allergy;
use Illuminate\Database\Seeder;

class AllergySeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->data() as $item) {
            $allergy = new Allergy();

            $allergy->name = $item['name'];
            $allergy->description = $item['description'];

            $allergy->save();
        }
    }

    private function data(): array
    {
        return [
            [
                'id' => '1e82fbd6-9cb4-4b28-a64e-e0a9f2622283',
                'name' => 'Alergia alimentaria',
                'description' => 'Reacción adversa a ciertos ingredientes en la dieta, como pollo, trigo, soja o lácteos, causando picazón, vómitos o diarrea',
            ],
            [
                'id' => '3963f10d-c29c-49bd-ba53-307d46d5447d',
                'name' => 'Alergia ambiental',
                'description' => 'Respuesta alérgica a factores ambientales como el polen, el moho o los ácaros del polvo, provocando estornudos, picazón y lagrimeo',
            ],
            [
                'id' => '58c184e9-43b5-4262-b1de-ebd8f6db9a84',
                'name' => 'Alergia a picaduras de pulgas',
                'description' => 'Hipersensibilidad a la saliva de las pulgas, causando inflamación intensa, pérdida de pelo y rascado excesivo',
            ],
            [
                'id' => '97fb94d0-808f-4527-8fa2-01cd7585b31a',
                'name' => 'Alergia de contacto',
                'description' => 'Reacción cutánea causada por el contacto con materiales como plásticos, tintes o productos de limpieza, generando irritación y enrojecimiento',
            ],
            [
                'id' => 'afd1b9e7-e344-4174-abba-176ae57deb1c',
                'name' => 'Alergia medicamentosa',
                'description' => 'Reacción adversa a ciertos medicamentos, como antibióticos o antiinflamatorios, que puede causar síntomas leves o graves, como erupciones o anafilaxia',
            ],
            [
                'id' => 'f1cb3dcf-a02a-480d-aca6-64a63ceb3fe3',
                'name' => 'Alergia a perfumes y químicos',
                'description' => 'Sensibilidad a fragancias o productos químicos en champús, aerosoles o detergentes, provocando irritación cutánea y problemas respiratorios',
            ],
            [
                'id' => 'f341bbf1-22eb-463d-95f4-328e322dcadf',
                'name' => 'Alergia a ácaros del polvo',
                'description' => 'Reacción a los ácaros presentes en el hogar, causando estornudos, picazón y problemas respiratorios en los perros sensibles',
            ],
        ];
    }
}
