<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{

    /**
     * Paises
     * CONSTANTE
     **/
    public const PAISES = [
1 => 'Afganistán',
2 => 'Albania',
3 => 'Alemania',
4 => 'Andorra',
5 => 'Angola',
6 => 'Antigua y Barbuda',
7 => 'Arabia Saudita',
8 => 'Argelia',
9 => 'Argentina',
10 => 'Armenia',
11 => 'Australia',
12 => 'Austria',
13 => 'Azerbaiyán',
14 => 'Bahamas',
15 => 'Bahréin',
16 => 'Bangladés',
17 => 'Barbados',
18 => 'Bielorrusia',
19 => 'Bélgica',
20 => 'Belice',
21 => 'Benín',
22 => 'Bután',
23 => 'Bolivia',
24 => 'Bosnia-Herzegovina',
25 => 'Botsuana',
26 => 'Brasil',
27 => 'Brunéi',
28 => 'Bulgaria',
29 => 'Burkina Faso',
30 => 'Burundi',
31 => 'Cabo Verde',
32 => 'Camboya',
33 => 'Camerún',
34 => 'Canadá',
35 => 'Chad',
36 => 'República Checa',
37 => 'Chequia',
38 => 'Chile',
39 => 'China',
40 => 'Chipre',
41 => 'Colombia',
42 => 'Comoras',
43 => 'Congo',
44 => 'República Democrática del Congo',
45 => 'Corea del Norte',
46 => 'Corea del Sur',
47 => 'Costa Rica',
48 => 'Costa de Marfil',
49 => 'Croacia',
50 => 'Cuba',
51 => 'Dinamarca',
52 => 'Yibuti',
53 => 'Dominica',
54 => 'Ecuador',
55 => 'Egipto',
56 => 'El Salvador',
57 => 'Emiratos Árabes Unidos',
58 => 'Eritrea',
59 => 'Eslovaquia',
60 => 'Eslovenia',
61 => 'España',
62 => 'Estados Unidos',
63 => 'Estonia',
64 => 'Etiopía',
65 => 'Fiyi',
66 => 'Filipinas',
67 => 'Finlandia',
68 => 'Francia',
69 => 'Gabón',
70 => 'Gambia',
71 => 'Georgia',
72 => 'Ghana',
73 => 'Granada',
74 => 'Grecia',
75 => 'Guatemala',
76 => 'Guinea',
77 => 'Guinea-Bissau',
78 => 'Guinea Ecuatorial',
79 => 'Guyana',
80 => 'Haití',
81 => 'Honduras',
82 => 'Hungría',
83 => 'India',
84 => 'Indonesia',
85 => 'Irán',
86 => 'Iraq',
87 => 'Irlanda',
88 => 'Islandia',
89 => 'Israel',
90 => 'Italia',
91 => 'Jamaica',
92 => 'Japón',
93 => 'Jordania',
94 => 'Kazajistán',
95 => 'Kenia',
96 => 'Kirguistán',
97 => 'Kiribati',
98 => 'Kuwait',
99 => 'Laos',
100 => 'Lesoto',
101 => 'Letonia',
102 => 'Líbano',
103 => 'Liberia',
104 => 'Libia',
105 => 'Liechtenstein',
106 => 'Lituania',
107 => 'Luxemburgo',
108 => 'Macedonia',
109 => 'Madagascar',
110 => 'Malasia',
111 => 'Malaui',
112 => 'Maldivas',
113 => 'Mali / Malí',
114 => 'Malta',
115 => 'Marruecos',
116 => 'Islas Marshall',
117 => 'Mauricio',
118 => 'Mauritania',
119 => 'México',
120 => 'Micronesia',
121 => 'Moldavia',
122 => 'Mónaco',
123 => 'Mongolia',
124 => 'Montenegro',
125 => 'Mozambique',
126 => 'Birmania',
127 => 'Namibia',
128 => 'Nauru',
129 => 'Nepal',
130 => 'Nicaragua',
131 => 'Níger',
132 => 'Nigeria',
133 => 'Noruega',
134 => 'Nueva Zelanda',
135 => 'Omán',
136 => 'Países Bajos',
137 => 'Pakistán',
138 => 'Palaos',
139 => 'Panamá',
140 => 'Papúa Nueva Guinea',
141 => 'Paraguay',
142 => 'Perú',
143 => 'Polonia',
144 => 'Portugal',
145 => 'Qatar',
146 => 'Reino Unido',
147 => 'República Centroafricana',
148 => 'República Dominicana',
149 => 'Rumanía / Rumania',
150 => 'Rusia',
151 => 'Ruanda',
152 => 'San Cristóbal y Nieves',
153 => 'Islas Salomón',
154 => 'Samoa',
155 => 'San Marino',
156 => 'Santa Lucía',
157 => 'Ciudad del Vaticano',
158 => 'Santo Tomé y Príncipe',
159 => 'San Vicente y las Granadinas',
160 => 'Senegal',
161 => 'Serbia',
162 => 'Seychelles',
163 => 'Sierra Leona',
164 => 'Singapur',
165 => 'Siria',
166 => 'Somalia',
167 => 'Sri Lanka',
168 => 'Sudáfrica',
169 => 'Sudán',
170 => 'Sudán del Sur',
171 => 'Suecia',
172 => 'Suiza',
173 => 'Surinam',
174 => 'Suazilandia',
175 => 'Tailandia',
176 => 'Tanzania',
177 => 'Tayikistán',
178 => 'Timor Oriental',
179 => 'Togo',
180 => 'Tonga',
181 => 'Trinidad y Tobago',
182 => 'Túnez',
183 => 'Turkmenistán',
184 => 'Turquía',
185 => 'Tuvalu',
186 => 'Ucrania',
187 => 'Uganda',
188 => 'Uruguay',
189 => 'Uzbekistán',
190 => 'Vanuatu',
191 => 'Venezuela',
192 => 'Vietnam',
193 => 'Yemen',
194 => 'Zambia',
195 => 'Zimbabue'
];

    public  static function getAll()
    {
        return PAISES;
    }
    /**
     * Devuelve el id de un pais dado
     *
     * @param string $pais  nombre del pais
     * @return int pais_id
     */
    public static function getPaisID($pais)
    {
        return array_search($pais, self::PAISES);
    }

    /**
     * Obtener el nombre del pais por id
     */
    public function getPaisAttribute()
    {
        return self::PAISES[ $this->attributes['pais_id'] ];
    }

    /**
     * setea el pais del usuario
     */
    public function setPaisAttribute($value)
    {
        $paisID = self::getPaisID($value);
        if ($paisID) {
        $this->attributes['pais_id'] = $paisID;
    }
    }
}

