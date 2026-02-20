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
            ['full_name' => 'ANSA', 'short_name' => 'ANSA'],
            ['full_name' => 'Building Community Voices', 'short_name' => 'BCV'],
            ['full_name' => 'Cambodian Disabled People Organization', 'short_name' => 'CDPO'],
            ['full_name' => 'Cambodia Volunteer for Society', 'short_name' => 'CVS'],
            ['full_name' => "Cambodian Women's Crisis Center", 'short_name' => 'CWCC'],
            ['full_name' => 'Caritas Australia', 'short_name' => 'CARITAS'],
            ['full_name' => 'CHETHOR', 'short_name' => 'CHETHOR'],
            ['full_name' => 'Children and Women Development Center in Cambodia', 'short_name' => 'CWDCC'],
            ['full_name' => 'Community Consultant for Development', 'short_name' => 'CCD'],
            ['full_name' => 'Community Development Center', 'short_name' => 'CDC'],
            ['full_name' => 'Community Training Organization For Development', 'short_name' => 'CTOD'],
            ['full_name' => 'Cooperation For Alleviation of Poverty Organization', 'short_name' => 'COFAP'],
            ['full_name' => 'Co-operation for Development of Cambodia', 'short_name' => 'CoDeC'],
            ['full_name' => 'Culture and Environment Preservation Association', 'short_name' => 'CEPA'],
            ['full_name' => 'Democracy Resource Center for National Development', 'short_name' => 'DND'],
            ['full_name' => 'Development and Partnership in Action', 'short_name' => 'DPA'],
            ['full_name' => 'Environmental Protection and Development', 'short_name' => 'EPDO'],
            ['full_name' => 'Environment and Health Education Organization', 'short_name' => 'EHEO'],
            ['full_name' => 'Environment and Human Rights Protection Organization', 'short_name' => 'EHRPO'],
            ['full_name' => 'FAEC Cambodia', 'short_name' => 'FAEC'],
            ['full_name' => 'Fishery Action Coalition Team', 'short_name' => 'FACT'],
            ['full_name' => 'GRET Cambodia', 'short_name' => 'GRET'],
            ['full_name' => 'HEKS', 'short_name' => 'HEKS'],
            ['full_name' => 'HelpAge Cambodia', 'short_name' => 'HAC'],
            ['full_name' => "Kampuchea Women's Welfare Action", 'short_name' => 'KWWA'],
            ['full_name' => 'Khmer Association For Development of Countryside', 'short_name' => 'KAFDOC'],
            ['full_name' => 'Lutheran Hope Cambodia Organization', 'short_name' => 'LHCO'],
            ['full_name' => 'Mennonite Central Committee', 'short_name' => 'MCC'],
            ['full_name' => 'Mlup Baitong', 'short_name' => 'MB'],
            ['full_name' => 'Mlup Promviheathor Center', 'short_name' => 'MPC'],
            ['full_name' => 'My Village', 'short_name' => 'MVI'],
            ['full_name' => 'Neakpoan Organization for Development', 'short_name' => 'NOD'],
            ['full_name' => 'Non-Timber Forest Products Exchange Programme', 'short_name' => 'NTFP-EP'],
            ['full_name' => 'Northeastern Rural Development', 'short_name' => 'NRD'],
            ['full_name' => 'Padek', 'short_name' => 'PADEK'],
            ['full_name' => 'Partners for Development in Action', 'short_name' => 'PfDA'],
            ['full_name' => 'Peace and Development Aid Organization', 'short_name' => 'PDAO'],
            ['full_name' => 'Phnom Neang Kangrei Association', 'short_name' => 'PNKA'],
            ['full_name' => 'Phnom Srey Organization for Development', 'short_name' => 'PSOD'],
            ['full_name' => 'Ponlok Khmer Organization', 'short_name' => 'PKH'],
            ['full_name' => 'Punlue Ney Kdey Sangkheum', 'short_name' => 'PNKS'],
            ['full_name' => 'Rural Aid Organization', 'short_name' => 'RAO'],
            ['full_name' => 'Rural Community and Environment Development Organization', 'short_name' => 'RCEDO'],
            ['full_name' => 'Rural Friend Community Development', 'short_name' => 'RFCD'],
            ['full_name' => 'SAMAKY', 'short_name' => 'SAMAKY'],
            ['full_name' => 'Save Vulnerable Cambodia', 'short_name' => 'SVC'],
            ['full_name' => 'Social Environment Agriculture Development Organization', 'short_name' => 'SEADO'],
            ['full_name' => 'Tekdeysovanphum Organization', 'short_name' => 'TDSP'],
            ['full_name' => 'The NGO Forum on Cambodia', 'short_name' => 'NGOF'],
            ['full_name' => 'Urban Poor Women Development', 'short_name' => 'UPWD'],
            ['full_name' => 'Village Support Group', 'short_name' => 'VSG'],
            ['full_name' => "Women's Community Voices", 'short_name' => 'WCV'],
            ['full_name' => 'Youth Council of Cambodia', 'short_name' => 'YCC'],
            ['full_name' => 'Youth For Peace Organization', 'short_name' => 'YPO'],

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
