<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member; // Your Member model
use Illuminate\Support\Facades\Hash;

class NgoSeeder extends Seeder
{
    public function run()
    {
        $ngos = [

            ['full_name' => 'Action Aid Cambodia', 'short_name' => 'AAC'],
            ['full_name' => 'Action For Development', 'short_name' => 'AFD'],
            ['full_name' => 'Building Community Voice', 'short_name' => 'BCV'],
            ['full_name' => 'Cambodia Indigenous People Organization', 'short_name' => 'CIPO'],
            ['full_name' => 'Cambodia Indigenous Peoples Alliance', 'short_name' => 'CIPA'],
            ['full_name' => 'Cambodia Indigenous Youth Association', 'short_name' => 'CIYA'],
            ['full_name' => 'Cambodian Human Rights and Development Association (ADHOC)', 'short_name' => 'ADHOC'],
            ['full_name' => 'Cambodian Natural Resource Organization', 'short_name' => 'CNRO'],
            ['full_name' => 'Cambodian Rural Development Team', 'short_name' => 'CRDT'],
            ['full_name' => "Centre d'Etude et de Developpement Agricole Cambodgien", 'short_name' => 'CDAC'],
            ['full_name' => 'Children and Women Development Center in Cambodia', 'short_name' => 'CWDCC'],
            ['full_name' => 'Community Empowerment Development Team', 'short_name' => 'CEDT'],
            ['full_name' => 'Community Legal Education Center', 'short_name' => 'CLEC'],
            ['full_name' => 'Community Training Organization for Development', 'short_name' => 'CTOD'],
            ['full_name' => 'Community Translation Organization', 'short_name' => 'CTO'],
            ['full_name' => 'Culture and Environment Preservation Association', 'short_name' => 'CEPA'],
            ['full_name' => 'DANMISSION Cambodia', 'short_name' => 'DANMISSION'],
            ['full_name' => 'Development and Partnership in Action', 'short_name' => 'DPA'],
            ['full_name' => 'Diakonia Cambodia', 'short_name' => 'DIAKONIA'],
            ['full_name' => 'Environment and Health Education', 'short_name' => 'EHE'],
            ['full_name' => 'Environment and Society Organization', 'short_name' => 'ESO'],
            ['full_name' => 'Forests and Livelihood Organization', 'short_name' => 'FLO'],
            ['full_name' => 'Habitat for Humanity International Cambodia', 'short_name' => 'HABITAT'],
            ['full_name' => 'HEKS/EPER - Swiss Church Aid Cambodia', 'short_name' => 'HEKS'],
            ['full_name' => 'Highlander Association', 'short_name' => 'HA'],
            ['full_name' => 'Indigenous Rights Active Members', 'short_name' => 'IRAM'],
            ['full_name' => 'Live and Learn Cambodia', 'short_name' => 'LLC'],
            ['full_name' => 'Mekong Regional Land Group', 'short_name' => 'MRLG'],
            ['full_name' => 'Mlup Baitong', 'short_name' => 'MB'],
            ['full_name' => 'Mlup Promviheathor Center Organization', 'short_name' => 'MPC'],
            ['full_name' => 'My Village Organization', 'short_name' => 'MVI'],
            ['full_name' => 'Non Timber Forest Products', 'short_name' => 'NTFP'],
            ['full_name' => 'Non Timber Forest Products - Exchange Programme', 'short_name' => 'NTFP-EP'],
            ['full_name' => 'Norwegian People\'s Aid Cambodia', 'short_name' => 'NPA'],
            ['full_name' => 'Open Development Cambodia', 'short_name' => 'ODC'],
            ['full_name' => 'OXFAM Cambodia', 'short_name' => 'OXFAM'],
            ['full_name' => 'People\'s Action for Inclusive Development', 'short_name' => 'PAFID'],
            ['full_name' => 'Planète Enfants & Développement Cambodia', 'short_name' => 'PED'],
            ['full_name' => 'RECOFTC Cambodia', 'short_name' => 'RECOFTC'],
            ['full_name' => 'Samakum Teang Tnaut', 'short_name' => 'STT'],
            ['full_name' => 'Save the Vulnerables Cambodia', 'short_name' => 'SVC'],
            ['full_name' => 'STAR Kampuchea', 'short_name' => 'SK'],
            ['full_name' => 'Urban Poor Women Development', 'short_name' => 'UPWD'],
            ['full_name' => 'Village Support Group', 'short_name' => 'VSG'],
            ['full_name' => 'Wildlife Conservation Society Cambodia', 'short_name' => 'WCS'],
            ['full_name' => 'Youth Council of Cambodia', 'short_name' => 'YCC'],
            ['full_name' => 'Ponlork Khmer Organization', 'short_name' => 'PKH'],
        ];

        foreach ($ngos as $ngo) {
            Member::create([
                'full_name' => $ngo['full_name'],
                'short_name' => $ngo['short_name'],
                'login_locked' => false,
                'has_voted' => false,
            ]);
        }
    }
}
