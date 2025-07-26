<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->data() as $item) {
            $disease = new Disease;

            $disease->name = $item['name'];
            $disease->description = $item['description'];

            $disease->save();
        }
    }

    private function data(): array
    {
        return [
            [
                'id' => '1856079f-1c87-4945-bf48-ff2aa692267e',
                'name' => 'Parvovirus Canino',
                'description' => 'Enfermedad viral altamente contagiosa que afecta el sistema digestivo y cardiovascular de los perros, especialmente cachorros no vacunados',
            ],
            [
                'id' => '3cc7f346-9901-424f-8aaa-a53bb7f3b40b',
                'name' => 'Moquillo Canino',
                'description' => 'Enfermedad viral grave que afecta el sistema respiratorio, digestivo y nervioso de los perros, causando fiebre, secreción nasal y convulsiones',
            ],
            [
                'id' => '486d673c-07e2-433b-8a89-fb7159171cd3',
                'name' => 'Leptospirosis',
                'description' => 'Infección bacteriana transmitida por el contacto con orina de animales infectados. Puede causar insuficiencia renal y hepática',
            ],
            [
                'id' => '4ccb17cf-b84b-4c1c-bbc8-018c5ae0fb20',
                'name' => 'Rabia',
                'description' => 'Enfermedad viral mortal que afecta el sistema nervioso central, causando cambios de comportamiento, agresividad y parálisis',
            ],
            [
                'id' => '5ce0b4ca-e69b-4133-818f-0a0eef33a7dc',
                'name' => 'Tos de las Perreras',
                'description' => 'Infección respiratoria altamente contagiosa causada por bacterias y virus, que provoca tos seca persistente y dificultad para respirar',
            ],
            [
                'id' => '94d1c283-864b-4f2b-aa84-bf88e951bfa6',
                'name' => 'Ehrlichiosis Canina',
                'description' => 'Enfermedad transmitida por garrapatas que afecta los glóbulos blancos, causando fiebre, letargo y sangrado anormal',
            ],
            [
                'id' => 'ac045b30-a77f-475d-b98a-991372f54b28',
                'name' => 'Filariasis Canina',
                'description' => 'Enfermedad causada por parásitos del corazón transmitidos por mosquitos, que pueden provocar insuficiencia cardíaca y respiratoria',
            ],
            [
                'id' => 'b5442db2-0764-4a6c-9508-442883ccd61e',
                'name' => 'Gastroenteritis Hemorrágica',
                'description' => 'Trastorno gastrointestinal caracterizado por vómitos y diarrea con sangre, generalmente causado por infecciones o intoxicaciones',
            ],
            [
                'id' => 'd66f858e-41b9-4ca4-8412-605fb977d5a2',
                'name' => 'Sarna Demodécica',
                'description' => 'Enfermedad de la piel causada por ácaros Demodex, que provoca pérdida de pelo, enrojecimiento y picazón intensa',
            ],
            [
                'id' => 'dd45c907-74e2-4f60-996a-ee14064d3558',
                'name' => 'Anaplasmosis Canina',
                'description' => 'Infección transmitida por garrapatas que afecta los glóbulos rojos, causando fiebre, letargo y cojera',
            ],
        ];
    }
}
