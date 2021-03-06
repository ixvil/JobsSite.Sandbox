<?php

namespace App\Http\Controllers;

use App\Events\NewVacancyAppeared;
use App\Vacancy;
use App\VacancyStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class VacanciesController extends Controller
{
    const VACANCIES_CREATE_PATH = "/vacancies/create";
    const VACANCIES_LIST_PATH = "/vacancies/list";


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createVacancy(Request $request)
    {
        $this->validator($request->all())->validate();
        $vacancy = $this->create($request->all());
        event(new NewVacancyAppeared($vacancy));
        return redirect($this->redirectPath());
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreateVacancyForm()
    {
        return view('vacancies/create');
    }

    /**
     * @param array $data
     * @return Vacancy
     */
    protected function create(array $data)
    {
        /** @var Vacancy $newVacancy */
        $newVacancy = Vacancy::create([
            'title' => $data['title'],
            'email' => $data['email'],
            'description' => $data['description'],
            'status_id' => VacancyStatus::NEW_STATUS
        ]);

        return $newVacancy;

    }

    /**
     * @param array $data
     * @return Validator
     */
    protected function validator(array $data)
    {
        /** @var Validator $validator */
        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|max:999'
        ]);

        return $validator;
    }


    /**
     * @return string
     */
    private function redirectPath()
    {
        return self::VACANCIES_LIST_PATH;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listVacancies()
    {
        /** @var Vacancy $vacancies */
        $vacancies = Vacancy::where('status_id', '=', VacancyStatus::APPROVED_STATUS)->paginate(15);

        return view('vacancies/list', ['vacancies' => $vacancies]);
    }

    /**
     * @param Vacancy $vacancy
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function approve(Vacancy $vacancy)
    {
        if (!Auth::guest() && Auth::user()->can('moderate-vacancy')) {
            $vacancy->status_id = VacancyStatus::APPROVED_STATUS;
            $vacancy->save();
            return view('vacancies/ok', array('vacancy' => $vacancy));
        } else {
            return redirect("/home");
        }
    }

    /**
     * @param Vacancy $vacancy
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function remove(Vacancy $vacancy)
    {
        if (!Auth::guest() && Auth::user()->can('moderate-vacancy')) {
            $vacancy->status_id = VacancyStatus::DECLINED_STATUS;
            $vacancy->save();
            return view('vacancies/ok', array('vacancy' => $vacancy));
        } else {
            return redirect("/home");
        }
    }

}
