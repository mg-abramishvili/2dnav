<?php

namespace Database\Seeders\urs;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StoreTagSeeder extends Seeder
{
    public function run()
    {
        DB::table('store_tag')->insert([
            [
                'id' => 3,
                'store_id' => 1,
                'tag_id' => 2
            ],
            [
                'id' => 4,
                'store_id' => 1,
                'tag_id' => 8
            ],
            [
                'id' => 5,
                'store_id' => 2,
                'tag_id' => 9
            ],
            [
                'id' => 6,
                'store_id' => 2,
                'tag_id' => 16
            ],
            [
                'id' => 7,
                'store_id' => 2,
                'tag_id' => 22
            ],
            [
                'id' => 11,
                'store_id' => 4,
                'tag_id' => 9
            ],
            [
                'id' => 12,
                'store_id' => 4,
                'tag_id' => 16
            ],
            [
                'id' => 13,
                'store_id' => 4,
                'tag_id' => 22
            ],
            [
                'id' => 14,
                'store_id' => 5,
                'tag_id' => 23
            ],
            [
                'id' => 15,
                'store_id' => 6,
                'tag_id' => 9
            ],
            [
                'id' => 16,
                'store_id' => 6,
                'tag_id' => 16
            ],
            [
                'id' => 17,
                'store_id' => 7,
                'tag_id' => 9
            ],
            [
                'id' => 18,
                'store_id' => 7,
                'tag_id' => 16
            ],
            [
                'id' => 19,
                'store_id' => 8,
                'tag_id' => 13
            ],
            [
                'id' => 20,
                'store_id' => 9,
                'tag_id' => 2
            ],
            [
                'id' => 21,
                'store_id' => 9,
                'tag_id' => 12
            ],
            [
                'id' => 22,
                'store_id' => 10,
                'tag_id' => 9
            ],
            [
                'id' => 23,
                'store_id' => 11,
                'tag_id' => 2
            ],
            [
                'id' => 24,
                'store_id' => 11,
                'tag_id' => 6
            ],
            [
                'id' => 25,
                'store_id' => 12,
                'tag_id' => 9
            ],
            [
                'id' => 26,
                'store_id' => 12,
                'tag_id' => 16
            ],
            [
                'id' => 27,
                'store_id' => 13,
                'tag_id' => 22
            ],
            [
                'id' => 28,
                'store_id' => 14,
                'tag_id' => 18
            ],
            [
                'id' => 29,
                'store_id' => 15,
                'tag_id' => 9
            ],
            [
                'id' => 30,
                'store_id' => 15,
                'tag_id' => 16
            ],
            [
                'id' => 31,
                'store_id' => 16,
                'tag_id' => 24
            ],
            [
                'id' => 32,
                'store_id' => 17,
                'tag_id' => 3
            ],
            [
                'id' => 33,
                'store_id' => 17,
                'tag_id' => 6
            ],
            [
                'id' => 34,
                'store_id' => 17,
                'tag_id' => 10
            ],
            [
                'id' => 35,
                'store_id' => 18,
                'tag_id' => 3
            ],
            [
                'id' => 36,
                'store_id' => 18,
                'tag_id' => 5
            ],
            [
                'id' => 37,
                'store_id' => 18,
                'tag_id' => 10
            ],
            [
                'id' => 38,
                'store_id' => 19,
                'tag_id' => 3
            ],
            [
                'id' => 39,
                'store_id' => 19,
                'tag_id' => 5
            ],
            [
                'id' => 40,
                'store_id' => 19,
                'tag_id' => 10
            ],
            [
                'id' => 41,
                'store_id' => 20,
                'tag_id' => 13
            ],
            [
                'id' => 42,
                'store_id' => 20,
                'tag_id' => 18
            ],
            [
                'id' => 43,
                'store_id' => 20,
                'tag_id' => 20
            ],
            [
                'id' => 44,
                'store_id' => 20,
                'tag_id' => 21
            ],
            [
                'id' => 45,
                'store_id' => 21,
                'tag_id' => 8
            ],
            [
                'id' => 46,
                'store_id' => 22,
                'tag_id' => 23
            ],
            [
                'id' => 47,
                'store_id' => 23,
                'tag_id' => 9
            ],
            [
                'id' => 48,
                'store_id' => 24,
                'tag_id' => 2
            ],
            [
                'id' => 49,
                'store_id' => 24,
                'tag_id' => 8
            ],
            [
                'id' => 50,
                'store_id' => 25,
                'tag_id' => 24
            ],
            [
                'id' => 51,
                'store_id' => 26,
                'tag_id' => 9
            ],
            [
                'id' => 52,
                'store_id' => 26,
                'tag_id' => 16
            ],
            [
                'id' => 53,
                'store_id' => 27,
                'tag_id' => 10
            ],
            [
                'id' => 54,
                'store_id' => 27,
                'tag_id' => 11
            ],
            [
                'id' => 56,
                'store_id' => 28,
                'tag_id' => 21
            ],
            [
                'id' => 57,
                'store_id' => 29,
                'tag_id' => 20
            ],
            [
                'id' => 58,
                'store_id' => 30,
                'tag_id' => 24
            ],
            [
                'id' => 59,
                'store_id' => 31,
                'tag_id' => 12
            ],
            [
                'id' => 60,
                'store_id' => 32,
                'tag_id' => 24
            ],
            [
                'id' => 61,
                'store_id' => 33,
                'tag_id' => 18
            ],
            [
                'id' => 62,
                'store_id' => 34,
                'tag_id' => 3
            ],
            [
                'id' => 63,
                'store_id' => 34,
                'tag_id' => 5
            ],
            [
                'id' => 64,
                'store_id' => 34,
                'tag_id' => 10
            ],
            [
                'id' => 65,
                'store_id' => 35,
                'tag_id' => 13
            ],
            [
                'id' => 66,
                'store_id' => 35,
                'tag_id' => 18
            ],
            [
                'id' => 67,
                'store_id' => 36,
                'tag_id' => 12
            ],
            [
                'id' => 68,
                'store_id' => 37,
                'tag_id' => 1
            ],
            [
                'id' => 69,
                'store_id' => 38,
                'tag_id' => 1
            ],
            [
                'id' => 70,
                'store_id' => 39,
                'tag_id' => 1
            ],
            [
                'id' => 71,
                'store_id' => 40,
                'tag_id' => 1
            ],
            [
                'id' => 72,
                'store_id' => 41,
                'tag_id' => 1
            ],
            [
                'id' => 73,
                'store_id' => 42,
                'tag_id' => 1
            ],
            [
                'id' => 74,
                'store_id' => 43,
                'tag_id' => 1
            ],
            [
                'id' => 75,
                'store_id' => 44,
                'tag_id' => 19
            ],
            [
                'id' => 76,
                'store_id' => 45,
                'tag_id' => 14
            ],
            [
                'id' => 77,
                'store_id' => 46,
                'tag_id' => 25
            ],
            [
                'id' => 78,
                'store_id' => 47,
                'tag_id' => 15
            ],
            [
                'id' => 79,
                'store_id' => 48,
                'tag_id' => 18
            ],
            [
                'id' => 80,
                'store_id' => 49,
                'tag_id' => 16
            ],
            [
                'id' => 81,
                'store_id' => 50,
                'tag_id' => 24
            ],
            [
                'id' => 82,
                'store_id' => 51,
                'tag_id' => 1
            ],
            [
                'id' => 83,
                'store_id' => 52,
                'tag_id' => 24
            ],
            [
                'id' => 84,
                'store_id' => 53,
                'tag_id' => 25
            ],
            [
                'id' => 85,
                'store_id' => 54,
                'tag_id' => 23
            ],
            [
                'id' => 86,
                'store_id' => 55,
                'tag_id' => 13
            ],
            [
                'id' => 87,
                'store_id' => 56,
                'tag_id' => 13
            ],
            [
                'id' => 88,
                'store_id' => 57,
                'tag_id' => 22
            ],
            [
                'id' => 89,
                'store_id' => 58,
                'tag_id' => 8
            ],
            [
                'id' => 90,
                'store_id' => 59,
                'tag_id' => 7
            ],
            [
                'id' => 91,
                'store_id' => 59,
                'tag_id' => 14
            ],
            [
                'id' => 92,
                'store_id' => 60,
                'tag_id' => 23
            ],
            [
                'id' => 93,
                'store_id' => 61,
                'tag_id' => 2
            ],
            [
                'id' => 94,
                'store_id' => 61,
                'tag_id' => 6
            ],
            [
                'id' => 95,
                'store_id' => 62,
                'tag_id' => 8
            ],
            [
                'id' => 96,
                'store_id' => 63,
                'tag_id' => 6
            ],
            [
                'id' => 97,
                'store_id' => 64,
                'tag_id' => 24
            ],
            [
                'id' => 98,
                'store_id' => 65,
                'tag_id' => 22
            ],
            [
                'id' => 99,
                'store_id' => 66,
                'tag_id' => 19
            ],
            [
                'id' => 100,
                'store_id' => 67,
                'tag_id' => 2
            ],
            [
                'id' => 101,
                'store_id' => 68,
                'tag_id' => 2
            ],
            [
                'id' => 102,
                'store_id' => 68,
                'tag_id' => 8
            ],
            [
                'id' => 103,
                'store_id' => 69,
                'tag_id' => 22
            ],
            [
                'id' => 104,
                'store_id' => 70,
                'tag_id' => 5
            ],
            [
                'id' => 105,
                'store_id' => 70,
                'tag_id' => 10
            ],
            [
                'id' => 106,
                'store_id' => 71,
                'tag_id' => 26
            ],
            [
                'id' => 107,
                'store_id' => 72,
                'tag_id' => 21
            ],
            [
                'id' => 108,
                'store_id' => 73,
                'tag_id' => 1
            ],
            [
                'id' => 109,
                'store_id' => 74,
                'tag_id' => 2
            ],
            [
                'id' => 110,
                'store_id' => 75,
                'tag_id' => 15
            ],
            [
                'id' => 111,
                'store_id' => 76,
                'tag_id' => 7
            ],
            [
                'id' => 112,
                'store_id' => 77,
                'tag_id' => 13
            ],
            [
                'id' => 113,
                'store_id' => 78,
                'tag_id' => 3
            ],
            [
                'id' => 114,
                'store_id' => 78,
                'tag_id' => 4
            ],
            [
                'id' => 115,
                'store_id' => 79,
                'tag_id' => 13
            ],
            [
                'id' => 116,
                'store_id' => 80,
                'tag_id' => 2
            ],
            [
                'id' => 117,
                'store_id' => 81,
                'tag_id' => 13
            ],
            [
                'id' => 118,
                'store_id' => 82,
                'tag_id' => 26
            ],
            [
                'id' => 119,
                'store_id' => 83,
                'tag_id' => 22
            ],
            [
                'id' => 120,
                'store_id' => 84,
                'tag_id' => 2
            ],
            [
                'id' => 121,
                'store_id' => 85,
                'tag_id' => 3
            ],
            [
                'id' => 122,
                'store_id' => 85,
                'tag_id' => 4
            ],
            [
                'id' => 123,
                'store_id' => 85,
                'tag_id' => 5
            ],
            [
                'id' => 124,
                'store_id' => 85,
                'tag_id' => 6
            ],
            [
                'id' => 125,
                'store_id' => 85,
                'tag_id' => 10
            ],
            [
                'id' => 126,
                'store_id' => 85,
                'tag_id' => 11
            ],
            [
                'id' => 127,
                'store_id' => 86,
                'tag_id' => 18
            ],
            [
                'id' => 128,
                'store_id' => 87,
                'tag_id' => 15
            ],
            [
                'id' => 129,
                'store_id' => 88,
                'tag_id' => 6
            ],
            [
                'id' => 130,
                'store_id' => 88,
                'tag_id' => 11
            ],
            [
                'id' => 131,
                'store_id' => 89,
                'tag_id' => 23
            ],
            [
                'id' => 132,
                'store_id' => 90,
                'tag_id' => 22
            ],
            [
                'id' => 133,
                'store_id' => 91,
                'tag_id' => 15
            ],
            [
                'id' => 134,
                'store_id' => 92,
                'tag_id' => 2
            ],
            [
                'id' => 135,
                'store_id' => 92,
                'tag_id' => 6
            ],
            [
                'id' => 136,
                'store_id' => 93,
                'tag_id' => 15
            ],
            [
                'id' => 137,
                'store_id' => 94,
                'tag_id' => 15
            ],
            [
                'id' => 138,
                'store_id' => 95,
                'tag_id' => 6
            ],
            [
                'id' => 139,
                'store_id' => 95,
                'tag_id' => 11
            ],
            [
                'id' => 140,
                'store_id' => 96,
                'tag_id' => 2
            ],
            [
                'id' => 141,
                'store_id' => 97,
                'tag_id' => 6
            ],
            [
                'id' => 142,
                'store_id' => 97,
                'tag_id' => 11
            ],
            [
                'id' => 143,
                'store_id' => 98,
                'tag_id' => 12
            ],
            [
                'id' => 144,
                'store_id' => 99,
                'tag_id' => 12
            ],
            [
                'id' => 145,
                'store_id' => 100,
                'tag_id' => 21
            ],
            [
                'id' => 146,
                'store_id' => 101,
                'tag_id' => 10
            ],
            [
                'id' => 147,
                'store_id' => 101,
                'tag_id' => 11
            ],
            [
                'id' => 148,
                'store_id' => 102,
                'tag_id' => 2
            ],
            [
                'id' => 149,
                'store_id' => 102,
                'tag_id' => 11
            ],
            [
                'id' => 150,
                'store_id' => 103,
                'tag_id' => 21
            ],
            [
                'id' => 151,
                'store_id' => 104,
                'tag_id' => 2
            ],
            [
                'id' => 152,
                'store_id' => 104,
                'tag_id' => 6
            ],
            [
                'id' => 153,
                'store_id' => 105,
                'tag_id' => 6
            ],
            [
                'id' => 154,
                'store_id' => 106,
                'tag_id' => 15
            ],
            [
                'id' => 155,
                'store_id' => 107,
                'tag_id' => 14
            ],
            [
                'id' => 156,
                'store_id' => 108,
                'tag_id' => 2
            ],
            [
                'id' => 157,
                'store_id' => 108,
                'tag_id' => 6
            ],
            [
                'id' => 158,
                'store_id' => 108,
                'tag_id' => 11
            ],
            [
                'id' => 159,
                'store_id' => 109,
                'tag_id' => 14
            ],
            [
                'id' => 160,
                'store_id' => 110,
                'tag_id' => 3
            ],
            [
                'id' => 161,
                'store_id' => 110,
                'tag_id' => 4
            ],
            [
                'id' => 162,
                'store_id' => 110,
                'tag_id' => 7
            ],
            [
                'id' => 163,
                'store_id' => 110,
                'tag_id' => 13
            ],
            [
                'id' => 164,
                'store_id' => 110,
                'tag_id' => 17
            ],
            [
                'id' => 165,
                'store_id' => 111,
                'tag_id' => 2
            ],
            [
                'id' => 166,
                'store_id' => 111,
                'tag_id' => 4
            ],
            [
                'id' => 167,
                'store_id' => 111,
                'tag_id' => 6
            ],
            [
                'id' => 168,
                'store_id' => 111,
                'tag_id' => 11
            ],
            [
                'id' => 169,
                'store_id' => 111,
                'tag_id' => 12
            ],
            [
                'id' => 170,
                'store_id' => 112,
                'tag_id' => 22
            ],
            [
                'id' => 171,
                'store_id' => 113,
                'tag_id' => 14
            ],
            [
                'id' => 172,
                'store_id' => 114,
                'tag_id' => 6
            ],
            [
                'id' => 173,
                'store_id' => 115,
                'tag_id' => 2
            ],
            [
                'id' => 174,
                'store_id' => 116,
                'tag_id' => 15
            ],
            [
                'id' => 175,
                'store_id' => 117,
                'tag_id' => 11
            ],
            [
                'id' => 176,
                'store_id' => 118,
                'tag_id' => 3
            ],
            [
                'id' => 177,
                'store_id' => 118,
                'tag_id' => 4
            ],
            [
                'id' => 178,
                'store_id' => 119,
                'tag_id' => 2
            ],
            [
                'id' => 179,
                'store_id' => 119,
                'tag_id' => 5
            ],
            [
                'id' => 180,
                'store_id' => 119,
                'tag_id' => 6
            ],
            [
                'id' => 181,
                'store_id' => 120,
                'tag_id' => 2
            ],
            [
                'id' => 182,
                'store_id' => 120,
                'tag_id' => 5
            ],
            [
                'id' => 183,
                'store_id' => 120,
                'tag_id' => 6
            ],
            [
                'id' => 184,
                'store_id' => 121,
                'tag_id' => 3
            ],
            [
                'id' => 185,
                'store_id' => 121,
                'tag_id' => 5
            ],
            [
                'id' => 186,
                'store_id' => 121,
                'tag_id' => 10
            ],
            [
                'id' => 187,
                'store_id' => 122,
                'tag_id' => 5
            ],
            [
                'id' => 188,
                'store_id' => 122,
                'tag_id' => 6
            ],
            [
                'id' => 189,
                'store_id' => 123,
                'tag_id' => 3
            ],
            [
                'id' => 190,
                'store_id' => 123,
                'tag_id' => 4
            ],
            [
                'id' => 191,
                'store_id' => 124,
                'tag_id' => 28
            ],
            [
                'id' => 192,
                'store_id' => 125,
                'tag_id' => 28
            ],
            [
                'id' => 193,
                'store_id' => 126,
                'tag_id' => 28
            ],
            [
                'id' => 194,
                'store_id' => 127,
                'tag_id' => 27
            ]
        ]);
    }
}
