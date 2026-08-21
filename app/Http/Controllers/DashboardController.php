<?php

namespace App\Http\Controllers;

use App\Models\ALevelScore;
use App\Models\ALevelSubject;
use App\Models\OLevelScore;
use App\Models\OLevelSubject;
use App\Models\Result;
use App\Services\GradeConfig;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function olevelSubjects()
    {
        $user = Auth::user();
        $subjects = OLevelSubject::where('user_id', $user->id)->get();
        $compulsory = GradeConfig::$compulsoryOLevel;

        return view('olevel_subjects', compact('subjects', 'compulsory'));
    }

    public function olevelSubjectsStore(Request $request)
    {
        $request->validate([
            'optional1' => ['required', 'string', 'max:100'],
            'optional2' => ['required', 'string', 'max:100'],
            'optional3' => ['nullable', 'string', 'max:100'],
        ]);

        try {
            DB::beginTransaction();

            $user = Auth::user();

            OLevelSubject::where('user_id', $user->id)->delete();

            $compulsory = GradeConfig::$compulsoryOLevel;
            foreach ($compulsory as $subject) {
                OLevelSubject::create([
                    'user_id' => $user->id,
                    'name' => $subject,
                    'is_compulsory' => true,
                ]);
            }

            $optionals = array_filter([$request->optional1, $request->optional2, $request->optional3]);
            foreach ($optionals as $subject) {
                OLevelSubject::firstOrCreate([
                    'user_id' => $user->id,
                    'name' => $subject,
                ], [
                    'is_compulsory' => false,
                ]);
            }

            DB::commit();

            return redirect()->route('olevel.scores')->with('success', 'O-Level subjects saved!');
        } catch (QueryException $e) {
            DB::rollBack();

            return back()->withInput()->with('error', 'A database error occurred. Please try again.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function olevelScores()
    {
        $user = Auth::user();
        $subjects = OLevelSubject::where('user_id', $user->id)->get();
        $scores = OLevelScore::where('user_id', $user->id)->get()->keyBy('subject_name');
        $grades = GradeConfig::olevelGrades();

        return view('olevel_scores', compact('subjects', 'scores', 'grades'));
    }

    public function olevelScoresStore(Request $request)
    {
        $user = Auth::user();
        $subjects = OLevelSubject::where('user_id', $user->id)->get();

        if ($subjects->isEmpty()) {
            return redirect()->route('olevel.subjects')->with('error', 'Please register O-Level subjects first.');
        }

        $rules = [];
        foreach ($subjects as $subject) {
            $rules['grade_'.$subject->id] = ['required', 'string', 'in:'.implode(',', GradeConfig::olevelGrades())];
        }
        $request->validate($rules);

        try {
            DB::beginTransaction();

            OLevelScore::where('user_id', $user->id)->delete();

            $totalWeight = 0;
            foreach ($subjects as $subject) {
                $grade = $request->input('grade_'.$subject->id);
                $map = GradeConfig::$olevelGradeMap[$grade];

                OLevelScore::create([
                    'user_id' => $user->id,
                    'subject_name' => $subject->name,
                    'grade' => $grade,
                    'bucket' => $map['bucket'],
                    'weight_value' => $map['weight'],
                ]);

                $totalWeight += $map['weight'];
            }

            Result::updateOrCreate(
                ['user_id' => $user->id],
                ['olevel_weight' => $totalWeight]
            );

            DB::commit();

            return redirect()->route('alevel.subjects')->with('success', 'O-Level scores saved!');
        } catch (QueryException $e) {
            DB::rollBack();

            return back()->with('error', 'A database error occurred. Please try again.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function alevelSubjects()
    {
        $user = Auth::user();
        $subjects = ALevelSubject::where('user_id', $user->id)->get();

        return view('alevel_subjects', compact('subjects'));
    }

    public function alevelSubjectsStore(Request $request)
    {
        $request->validate([
            'principle1' => ['required', 'string', 'max:100'],
            'principle2' => ['required', 'string', 'max:100'],
            'principle3' => ['required', 'string', 'max:100'],
            'subsidiary' => ['required', 'string', 'in:ICT,Subsidiary Mathematics'],
        ]);

        try {
            DB::beginTransaction();

            $user = Auth::user();

            ALevelSubject::where('user_id', $user->id)->delete();

            ALevelSubject::create([
                'user_id' => $user->id,
                'subject_name' => 'General Paper',
                'category' => 'subsidiary',
            ]);

            foreach ([$request->principle1, $request->principle2, $request->principle3] as $subject) {
                ALevelSubject::firstOrCreate([
                    'user_id' => $user->id,
                    'subject_name' => $subject,
                    'category' => 'principle',
                ]);
            }

            ALevelSubject::create([
                'user_id' => $user->id,
                'subject_name' => $request->subsidiary,
                'category' => 'subsidiary',
            ]);

            DB::commit();

            return redirect()->route('alevel.scores')->with('success', 'A-Level subjects saved!');
        } catch (QueryException $e) {
            DB::rollBack();

            return back()->withInput()->with('error', 'A database error occurred. Please try again.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function alevelScores()
    {
        $user = Auth::user();
        $principles = ALevelSubject::where('user_id', $user->id)
            ->where('category', 'principle')->get();
        $subsidiaries = ALevelSubject::where('user_id', $user->id)
            ->where('category', 'subsidiary')->get();
        $scores = ALevelScore::where('user_id', $user->id)->get()->keyBy('subject_name');

        return view('alevel_scores', compact('principles', 'subsidiaries', 'scores'));
    }

    public function alevelScoresStore(Request $request)
    {
        $user = Auth::user();
        $principles = ALevelSubject::where('user_id', $user->id)
            ->where('category', 'principle')->get();
        $subsidiaries = ALevelSubject::where('user_id', $user->id)
            ->where('category', 'subsidiary')->get();

        if ($principles->isEmpty() && $subsidiaries->isEmpty()) {
            return redirect()->route('alevel.subjects')->with('error', 'Please register A-Level subjects first.');
        }

        $rules = [];
        foreach ($principles as $subject) {
            $rules['grade_'.$subject->id] = ['required', 'string', 'in:'.implode(',', GradeConfig::principleGrades())];
        }
        foreach ($subsidiaries as $subject) {
            $rules['grade_'.$subject->id] = ['required', 'string', 'in:'.implode(',', GradeConfig::subsidiaryGrades())];
        }
        $request->validate($rules);

        try {
            DB::beginTransaction();

            ALevelScore::where('user_id', $user->id)->delete();

            $totalPoints = 0;
            foreach ($principles as $subject) {
                $grade = $request->input('grade_'.$subject->id);
                $points = GradeConfig::$alevelPrinciplePoints[$grade];

                ALevelScore::create([
                    'user_id' => $user->id,
                    'subject_name' => $subject->subject_name,
                    'grade' => $grade,
                    'points' => $points,
                    'category' => 'principle',
                ]);

                $totalPoints += $points;
            }

            foreach ($subsidiaries as $subject) {
                $grade = $request->input('grade_'.$subject->id);
                $points = GradeConfig::$alevelSubsidiaryPoints[$grade];

                ALevelScore::create([
                    'user_id' => $user->id,
                    'subject_name' => $subject->subject_name,
                    'grade' => $grade,
                    'points' => $points,
                    'category' => 'subsidiary',
                ]);

                $totalPoints += $points;
            }

            Result::updateOrCreate(
                ['user_id' => $user->id],
                ['total_points' => $totalPoints]
            );

            DB::commit();

            return redirect()->route('weight')->with('success', 'A-Level scores saved!');
        } catch (QueryException $e) {
            DB::rollBack();

            return back()->with('error', 'A database error occurred. Please try again.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function weight()
    {
        $user = Auth::user();
        $result = Result::where('user_id', $user->id)->first();
        $principles = ALevelScore::where('user_id', $user->id)
            ->where('category', 'principle')->get();

        return view('weight', compact('result', 'principles'));
    }

    public function weightStore(Request $request)
    {
        $request->validate([
            'essential1' => ['required', 'string', 'max:100'],
            'essential2' => ['required', 'string', 'max:100'],
            'desirable' => ['required', 'string', 'max:100'],
            'cutoff' => ['nullable', 'numeric', 'min:0', 'max:54'],
        ]);

        try {
            $user = Auth::user();

            $principles = ALevelScore::where('user_id', $user->id)
                ->where('category', 'principle')->get()->keyBy('subject_name');

            if ($principles->isEmpty()) {
                return redirect()->route('alevel.scores')->with('error', 'Please enter your A-Level scores first.');
            }

            $essential1Points = ($principles[$request->essential1] ?? (object) ['points' => 0])->points;
            $essential2Points = ($principles[$request->essential2] ?? (object) ['points' => 0])->points;
            $desirablePoints = ($principles[$request->desirable] ?? (object) ['points' => 0])->points;
            $subsidiaryScores = ALevelScore::where('user_id', $user->id)
                ->where('category', 'subsidiary')->get();
            $subsidiarySum = $subsidiaryScores->sum('points');

            $alevelWeight = ($essential1Points * 3) + ($essential2Points * 3) + ($desirablePoints * 2) + $subsidiarySum;

            $olevelWeight = Result::where('user_id', $user->id)->value('olevel_weight') ?? 0;

            $genderBonus = $user->gender === 'female' ? 1.5 : 0;

            $totalWeight = $alevelWeight + $olevelWeight + $genderBonus;

            $cutoff = $request->cutoff;
            $eligibility = null;
            if ($cutoff !== null) {
                $eligibility = $totalWeight >= $cutoff ? 'Eligible' : 'Try another course';
            }

            Result::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'alevel_weight' => $alevelWeight,
                    'gender_bonus' => $genderBonus,
                    'cutoff' => $cutoff,
                    'total_weight' => $totalWeight,
                    'eligibility' => $eligibility,
                ]
            );

            return redirect()->route('weight')->with('success', 'Weight calculated!');
        } catch (QueryException $e) {
            return back()->with('error', 'A database error occurred. Please try again.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function view()
    {
        $user = Auth::user();
        $olevelSubjects = OLevelSubject::where('user_id', $user->id)->get();
        $olevelScores = OLevelScore::where('user_id', $user->id)->get();
        $alevelSubjects = ALevelSubject::where('user_id', $user->id)->get();
        $alevelScores = ALevelScore::where('user_id', $user->id)->get();
        $result = Result::where('user_id', $user->id)->first();

        return view('view', compact(
            'user', 'olevelSubjects', 'olevelScores',
            'alevelSubjects', 'alevelScores', 'result'
        ));
    }
}
