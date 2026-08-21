<?php

namespace App\Services;

class GradeConfig
{
    public static array $olevelGradeMap = [
        'D1' => ['bucket' => 'distinction', 'weight' => 0.3],
        'D2' => ['bucket' => 'distinction', 'weight' => 0.3],
        'C3' => ['bucket' => 'credit', 'weight' => 0.2],
        'C4' => ['bucket' => 'credit', 'weight' => 0.2],
        'C5' => ['bucket' => 'credit', 'weight' => 0.2],
        'C6' => ['bucket' => 'credit', 'weight' => 0.2],
        'P7' => ['bucket' => 'pass', 'weight' => 0.1],
        'P8' => ['bucket' => 'pass', 'weight' => 0.1],
        'F9' => ['bucket' => 'fail', 'weight' => 0.0],
    ];

    public static array $alevelPrinciplePoints = [
        'A' => 6, 'B' => 5, 'C' => 4, 'D' => 3,
        'E' => 2, 'O' => 1, 'F' => 0,
    ];

    public static array $alevelSubsidiaryPoints = [
        'D1' => 1, 'D2' => 1, 'C3' => 1, 'C4' => 1,
        'C5' => 1, 'C6' => 1, 'P7' => 0, 'P8' => 0, 'F9' => 0,
    ];

    public static array $compulsoryOLevel = [
        'English', 'Mathematics', 'Physics', 'Chemistry',
        'History', 'Geography', 'Biology',
    ];

    public static function olevelGrades(): array
    {
        return array_keys(self::$olevelGradeMap);
    }

    public static function principleGrades(): array
    {
        return array_keys(self::$alevelPrinciplePoints);
    }

    public static function subsidiaryGrades(): array
    {
        return array_keys(self::$alevelSubsidiaryPoints);
    }
}
