<?php

namespace App\Constants;

class MotorSpesifications
{
    public function engineTemplate()
    {
        return [
            ['name' => 'Tipe Mesin', 'slug_name' => 'engineType'],
            ['name' => 'Sistem Suplai Bahan Bakar', 'slug_name' => 'fuelSystem'],
            ['name' => 'Diameter X Langkah', 'slug_name' => 'diameter'],
            ['name' => 'Tipe Transmisi', 'slug_name' => 'transmission'],
            ['name' => 'Rasio Kompresi', 'slug_name' => 'compression'],
            ['name' => 'Daya Maksimum', 'slug_name' => 'maxPower'],
            ['name' => 'Torsi Maksimum', 'slug_name' => 'maxTorque'],
            ['name' => 'Tipe Kopling', 'slug_name' => 'clucthType'],
            ['name' => 'Sistem Pendingin Mesin', 'slug_name' => 'coolingSystem'],
        ];
    }

    public function frameTemplate()
    {
        return [
            ['name' => 'Tipe Rangka', 'slug_name' => 'frameType'],
            ['name' => 'Tipe Suspensi Depan', 'slug_name' => 'frontSuspension'],
            ['name' => 'Tipe Suspensi Belakang', 'slug_name' => 'rearSuspension'],
            ['name' => 'Ukuran Ban Depan', 'slug_name' => 'frontTire'],
            ['name' => 'Ukuran Ban Belakang', 'slug_name' => 'rearTire'],
            ['name' => 'Rem Depan', 'slug_name' => 'frontBrake'],
            ['name' => 'Rem Belakang', 'slug_name' => 'rearBrake'],
            ['name' => 'Sistem Pengereman', 'slug_name' => 'brakingSystem'],
        ];
    }

    public function dimensionTemplate()
    {
        return [
            ['name' => 'Panjang X Lebar X Tinggi', 'slug_name' => 'dimension'],
            ['name' => 'Tinggi Tempat Duduk', 'slug_name' => 'seatHeight'],
            ['name' => 'Jarak Sumbu Roda', 'slug_name' => 'wheelbase'],
            ['name' => 'Jarak Terendah Ke Tanah', 'slug_name' => 'groundClearance'],
            ['name' => 'Curb Weight', 'slug_name' => 'curbWeight'],
        ];
    }

    public function electricityTemplate()
    {
        return [
            ['name' => 'Tipe Baterai Atau Aki', 'slug_name' => 'batteryType'],
            ['name' => 'Sistem Pengapian', 'slug_name' => 'ignitionType'],
            ['name' => 'Tipe Busi', 'slug_name' => 'sparkPlugType'],
        ];
    }

    public function capacityTemplate()
    {
        return [
            ['name' => 'Kapasitas Tangki Bahan Bakar', 'slug_name' => 'fuelCapacity'],
            ['name' => 'Kapasitas Minyak Pelumas', 'slug_name' => 'oilCapacity'],
        ];
    }

    public function engine()
    {
        return [
            'engineType' => null,
            'fuelSystem' => null,
            'diameter' => null,
            'transmission' => null,
            'compression' => null,
            'maxPower' => null,
            'maxTorque' => null,
            'clucthType' => null,
            'coolingSystem' => null,
        ];
    }

    public function frame()
    {
        return [
            'frameType' => null,
            'frontSuspension' => null,
            'rearSuspension' => null,
            'frontTire' => null,
            'rearTire' => null,
            'frontBrake' => null,
            'rearBrake' => null,
            'brakingSystem' => null,
        ];
    }

    public function dimension()
    {
        return [
            'dimension' => null,
            'seatHeight' => null,
            'wheelbase' => null,
            'groundClearance' => null,
            'curbWeight' => null,
        ];
    }

    public function electricity()
    {
        return [
            'batteryType' => null,
            'ignitionType' => null,
            'sparkPlugType' => null,
        ];
    }

    public function capacity()
    {
        return [
            'fuelCapacity' => null,
            'oilCapacity' => null,
        ];
    }
}