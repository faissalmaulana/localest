<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        /**
         * Source:
         * Simple English Wikipedia
         * https://simple.wikipedia.org/wiki/List_of_countries (current commit date)
         *
         * Note:
         * - Names are normalized slightly for consistency (e.g. removed "The")
         * - ISO2 codes are manually mapped to standard ISO 3166-1 alpha-2
         */

        // length: 195
        $countries = [
            ["name" => "Afghanistan", "iso2_code" => "AF"],
            ["name" => "Albania", "iso2_code" => "AL"],
            ["name" => "Algeria", "iso2_code" => "DZ"],
            ["name" => "Andorra", "iso2_code" => "AD"],
            ["name" => "Angola", "iso2_code" => "AO"],
            ["name" => "Antigua and Barbuda", "iso2_code" => "AG"],
            ["name" => "Argentina", "iso2_code" => "AR"],
            ["name" => "Armenia", "iso2_code" => "AM"],
            ["name" => "Australia", "iso2_code" => "AU"],
            ["name" => "Austria", "iso2_code" => "AT"],
            ["name" => "Azerbaijan", "iso2_code" => "AZ"],

            ["name" => "Bahamas", "iso2_code" => "BS"],
            ["name" => "Bahrain", "iso2_code" => "BH"],
            ["name" => "Bangladesh", "iso2_code" => "BD"],
            ["name" => "Barbados", "iso2_code" => "BB"],
            ["name" => "Belarus", "iso2_code" => "BY"],
            ["name" => "Belgium", "iso2_code" => "BE"],
            ["name" => "Belize", "iso2_code" => "BZ"],
            ["name" => "Benin", "iso2_code" => "BJ"],
            ["name" => "Bhutan", "iso2_code" => "BT"],
            ["name" => "Bolivia", "iso2_code" => "BO"],
            ["name" => "Bosnia and Herzegovina", "iso2_code" => "BA"],
            ["name" => "Botswana", "iso2_code" => "BW"],
            ["name" => "Brazil", "iso2_code" => "BR"],
            ["name" => "Brunei", "iso2_code" => "BN"],
            ["name" => "Bulgaria", "iso2_code" => "BG"],
            ["name" => "Burkina Faso", "iso2_code" => "BF"],
            ["name" => "Burundi", "iso2_code" => "BI"],

            ["name" => "Cambodia", "iso2_code" => "KH"],
            ["name" => "Cameroon", "iso2_code" => "CM"],
            ["name" => "Canada", "iso2_code" => "CA"],
            ["name" => "Cape Verde", "iso2_code" => "CV"],
            ["name" => "Central African Republic", "iso2_code" => "CF"],
            ["name" => "Chad", "iso2_code" => "TD"],
            ["name" => "Chile", "iso2_code" => "CL"],
            ["name" => "China", "iso2_code" => "CN"],
            ["name" => "Colombia", "iso2_code" => "CO"],
            ["name" => "Comoros", "iso2_code" => "KM"],
            ["name" => "Costa Rica", "iso2_code" => "CR"],
            ["name" => "Croatia", "iso2_code" => "HR"],
            ["name" => "Cuba", "iso2_code" => "CU"],
            ["name" => "Cyprus", "iso2_code" => "CY"],
            ["name" => "Czechia", "iso2_code" => "CZ"],

            ["name" => "Democratic Republic of the Congo", "iso2_code" => "CD"],
            ["name" => "Denmark", "iso2_code" => "DK"],
            ["name" => "Djibouti", "iso2_code" => "DJ"],
            ["name" => "Dominica", "iso2_code" => "DM"],
            ["name" => "Dominican Republic", "iso2_code" => "DO"],

            ["name" => "East Timor", "iso2_code" => "TL"],
            ["name" => "Ecuador", "iso2_code" => "EC"],
            ["name" => "Egypt", "iso2_code" => "EG"],
            ["name" => "El Salvador", "iso2_code" => "SV"],
            ["name" => "Equatorial Guinea", "iso2_code" => "GQ"],
            ["name" => "Eritrea", "iso2_code" => "ER"],
            ["name" => "Estonia", "iso2_code" => "EE"],
            ["name" => "Eswatini", "iso2_code" => "SZ"],
            ["name" => "Ethiopia", "iso2_code" => "ET"],

            ["name" => "Federated States of Micronesia", "iso2_code" => "FM"],
            ["name" => "Fiji", "iso2_code" => "FJ"],
            ["name" => "Finland", "iso2_code" => "FI"],
            ["name" => "France", "iso2_code" => "FR"],

            ["name" => "Gabon", "iso2_code" => "GA"],
            ["name" => "Gambia", "iso2_code" => "GM"],
            ["name" => "Georgia", "iso2_code" => "GE"],
            ["name" => "Germany", "iso2_code" => "DE"],
            ["name" => "Ghana", "iso2_code" => "GH"],
            ["name" => "Greece", "iso2_code" => "GR"],
            ["name" => "Grenada", "iso2_code" => "GD"],
            ["name" => "Guatemala", "iso2_code" => "GT"],
            ["name" => "Guinea", "iso2_code" => "GN"],
            ["name" => "Guinea-Bissau", "iso2_code" => "GW"],
            ["name" => "Guyana", "iso2_code" => "GY"],

            ["name" => "Haiti", "iso2_code" => "HT"],
            ["name" => "Honduras", "iso2_code" => "HN"],
            ["name" => "Hungary", "iso2_code" => "HU"],

            ["name" => "Iceland", "iso2_code" => "IS"],
            ["name" => "India", "iso2_code" => "IN"],
            ["name" => "Indonesia", "iso2_code" => "ID"],
            ["name" => "Iran", "iso2_code" => "IR"],
            ["name" => "Iraq", "iso2_code" => "IQ"],
            ["name" => "Ireland", "iso2_code" => "IE"],
            ["name" => "Israel", "iso2_code" => "IL"],
            ["name" => "Italy", "iso2_code" => "IT"],
            ["name" => "Ivory Coast", "iso2_code" => "CI"],

            ["name" => "Jamaica", "iso2_code" => "JM"],
            ["name" => "Japan", "iso2_code" => "JP"],
            ["name" => "Jordan", "iso2_code" => "JO"],

            ["name" => "Kazakhstan", "iso2_code" => "KZ"],
            ["name" => "Kenya", "iso2_code" => "KE"],
            ["name" => "Kiribati", "iso2_code" => "KI"],
            ["name" => "Kuwait", "iso2_code" => "KW"],
            ["name" => "Kyrgyzstan", "iso2_code" => "KG"],

            ["name" => "Laos", "iso2_code" => "LA"],
            ["name" => "Latvia", "iso2_code" => "LV"],
            ["name" => "Lebanon", "iso2_code" => "LB"],
            ["name" => "Lesotho", "iso2_code" => "LS"],
            ["name" => "Liberia", "iso2_code" => "LR"],
            ["name" => "Libya", "iso2_code" => "LY"],
            ["name" => "Liechtenstein", "iso2_code" => "LI"],
            ["name" => "Lithuania", "iso2_code" => "LT"],
            ["name" => "Luxembourg", "iso2_code" => "LU"],

            ["name" => "Madagascar", "iso2_code" => "MG"],
            ["name" => "Malawi", "iso2_code" => "MW"],
            ["name" => "Malaysia", "iso2_code" => "MY"],
            ["name" => "Maldives", "iso2_code" => "MV"],
            ["name" => "Mali", "iso2_code" => "ML"],
            ["name" => "Malta", "iso2_code" => "MT"],
            ["name" => "Marshall Islands", "iso2_code" => "MH"],
            ["name" => "Mauritania", "iso2_code" => "MR"],
            ["name" => "Mauritius", "iso2_code" => "MU"],
            ["name" => "Mexico", "iso2_code" => "MX"],
            ["name" => "Moldova", "iso2_code" => "MD"],
            ["name" => "Monaco", "iso2_code" => "MC"],
            ["name" => "Mongolia", "iso2_code" => "MN"],
            ["name" => "Montenegro", "iso2_code" => "ME"],
            ["name" => "Morocco", "iso2_code" => "MA"],
            ["name" => "Mozambique", "iso2_code" => "MZ"],
            ["name" => "Myanmar", "iso2_code" => "MM"],

            ["name" => "Namibia", "iso2_code" => "NA"],
            ["name" => "Nauru", "iso2_code" => "NR"],
            ["name" => "Nepal", "iso2_code" => "NP"],
            ["name" => "Netherlands", "iso2_code" => "NL"],
            ["name" => "New Zealand", "iso2_code" => "NZ"],
            ["name" => "Nicaragua", "iso2_code" => "NI"],
            ["name" => "Niger", "iso2_code" => "NE"],
            ["name" => "Nigeria", "iso2_code" => "NG"],
            ["name" => "North Korea", "iso2_code" => "KP"],
            ["name" => "North Macedonia", "iso2_code" => "MK"],
            ["name" => "Norway", "iso2_code" => "NO"],

            ["name" => "Oman", "iso2_code" => "OM"],

            ["name" => "Pakistan", "iso2_code" => "PK"],
            ["name" => "Palau", "iso2_code" => "PW"],
            ["name" => "Palestine", "iso2_code" => "PS"],
            ["name" => "Panama", "iso2_code" => "PA"],
            ["name" => "Papua New Guinea", "iso2_code" => "PG"],
            ["name" => "Paraguay", "iso2_code" => "PY"],
            ["name" => "Peru", "iso2_code" => "PE"],
            ["name" => "Philippines", "iso2_code" => "PH"],
            ["name" => "Poland", "iso2_code" => "PL"],
            ["name" => "Portugal", "iso2_code" => "PT"],

            ["name" => "Qatar", "iso2_code" => "QA"],

            ["name" => "Republic of the Congo", "iso2_code" => "CG"],
            ["name" => "Romania", "iso2_code" => "RO"],
            ["name" => "Russia", "iso2_code" => "RU"],
            ["name" => "Rwanda", "iso2_code" => "RW"],

            ["name" => "Saint Kitts and Nevis", "iso2_code" => "KN"],
            ["name" => "Saint Lucia", "iso2_code" => "LC"],
            ["name" => "Saint Vincent and the Grenadines", "iso2_code" => "VC"],
            ["name" => "Samoa", "iso2_code" => "WS"],
            ["name" => "San Marino", "iso2_code" => "SM"],
            ["name" => "Sao Tome and Principe", "iso2_code" => "ST"],
            ["name" => "Saudi Arabia", "iso2_code" => "SA"],
            ["name" => "Senegal", "iso2_code" => "SN"],
            ["name" => "Serbia", "iso2_code" => "RS"],
            ["name" => "Seychelles", "iso2_code" => "SC"],
            ["name" => "Sierra Leone", "iso2_code" => "SL"],
            ["name" => "Singapore", "iso2_code" => "SG"],
            ["name" => "Slovakia", "iso2_code" => "SK"],
            ["name" => "Slovenia", "iso2_code" => "SI"],
            ["name" => "Solomon Islands", "iso2_code" => "SB"],
            ["name" => "Somalia", "iso2_code" => "SO"],
            ["name" => "South Africa", "iso2_code" => "ZA"],
            ["name" => "South Korea", "iso2_code" => "KR"],
            ["name" => "South Sudan", "iso2_code" => "SS"],
            ["name" => "Spain", "iso2_code" => "ES"],
            ["name" => "Sri Lanka", "iso2_code" => "LK"],
            ["name" => "Sudan", "iso2_code" => "SD"],
            ["name" => "Suriname", "iso2_code" => "SR"],
            ["name" => "Sweden", "iso2_code" => "SE"],
            ["name" => "Switzerland", "iso2_code" => "CH"],
            ["name" => "Syria", "iso2_code" => "SY"],

            ["name" => "Tajikistan", "iso2_code" => "TJ"],
            ["name" => "Tanzania", "iso2_code" => "TZ"],
            ["name" => "Thailand", "iso2_code" => "TH"],
            ["name" => "Togo", "iso2_code" => "TG"],
            ["name" => "Tonga", "iso2_code" => "TO"],
            ["name" => "Trinidad and Tobago", "iso2_code" => "TT"],
            ["name" => "Tunisia", "iso2_code" => "TN"],
            ["name" => "Turkey", "iso2_code" => "TR"],
            ["name" => "Turkmenistan", "iso2_code" => "TM"],
            ["name" => "Tuvalu", "iso2_code" => "TV"],

            ["name" => "Uganda", "iso2_code" => "UG"],
            ["name" => "Ukraine", "iso2_code" => "UA"],
            ["name" => "United Arab Emirates", "iso2_code" => "AE"],
            ["name" => "United Kingdom", "iso2_code" => "GB"],
            ["name" => "United States", "iso2_code" => "US"],
            ["name" => "Uruguay", "iso2_code" => "UY"],
            ["name" => "Uzbekistan", "iso2_code" => "UZ"],

            ["name" => "Vanuatu", "iso2_code" => "VU"],
            ["name" => "Vatican City", "iso2_code" => "VA"],
            ["name" => "Venezuela", "iso2_code" => "VE"],
            ["name" => "Vietnam", "iso2_code" => "VN"],

            ["name" => "Yemen", "iso2_code" => "YE"],

            ["name" => "Zambia", "iso2_code" => "ZM"],
            ["name" => "Zimbabwe", "iso2_code" => "ZW"]
        ];

        foreach ($countries as $country) {
            Country::create($country);
        };
    }
}
