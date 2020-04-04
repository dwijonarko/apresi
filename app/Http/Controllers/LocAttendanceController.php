<?php

namespace App\Http\Controllers;

use App\DataTables\LocAttendanceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLocAttendanceRequest;
use App\Http\Requests\UpdateLocAttendanceRequest;
use App\Repositories\LocAttendanceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LocAttendanceController extends AppBaseController
{
    /** @var  LocAttendanceRepository */
    private $locAttendanceRepository;

    public function __construct(LocAttendanceRepository $locAttendanceRepo)
    {
        $this->locAttendanceRepository = $locAttendanceRepo;
    }

    /**
     * Display a listing of the LocAttendance.
     *
     * @param LocAttendanceDataTable $locAttendanceDataTable
     * @return Response
     */
    public function index(LocAttendanceDataTable $locAttendanceDataTable)
    {
        return $locAttendanceDataTable->render('loc_attendances.index');
    }

    /**
     * Show the form for creating a new LocAttendance.
     *
     * @return Response
     */
    public function create()
    {
        return view('loc_attendances.create');
    }

    /**
     * Store a newly created LocAttendance in storage.
     *
     * @param CreateLocAttendanceRequest $request
     *
     * @return Response
     */
    public function store(CreateLocAttendanceRequest $request)
    {
        $input = $request->all();

        $locAttendance = $this->locAttendanceRepository->create($input);

        Flash::success('Loc Attendance saved successfully.');

        return redirect(route('locAttendances.index'));
    }

    /**
     * Display the specified LocAttendance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $locAttendance = $this->locAttendanceRepository->find($id);

        if (empty($locAttendance)) {
            Flash::error('Loc Attendance not found');

            return redirect(route('locAttendances.index'));
        }

        return view('loc_attendances.show')->with('locAttendance', $locAttendance);
    }

    /**
     * Show the form for editing the specified LocAttendance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $locAttendance = $this->locAttendanceRepository->find($id);

        if (empty($locAttendance)) {
            Flash::error('Loc Attendance not found');

            return redirect(route('locAttendances.index'));
        }

        return view('loc_attendances.edit')->with('locAttendance', $locAttendance);
    }

    /**
     * Update the specified LocAttendance in storage.
     *
     * @param  int              $id
     * @param UpdateLocAttendanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLocAttendanceRequest $request)
    {
        $locAttendance = $this->locAttendanceRepository->find($id);

        if (empty($locAttendance)) {
            Flash::error('Loc Attendance not found');

            return redirect(route('locAttendances.index'));
        }

        $locAttendance = $this->locAttendanceRepository->update($request->all(), $id);

        Flash::success('Loc Attendance updated successfully.');

        return redirect(route('locAttendances.index'));
    }

    /**
     * Remove the specified LocAttendance from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $locAttendance = $this->locAttendanceRepository->find($id);

        if (empty($locAttendance)) {
            Flash::error('Loc Attendance not found');

            return redirect(route('locAttendances.index'));
        }

        $this->locAttendanceRepository->delete($id);

        Flash::success('Loc Attendance deleted successfully.');

        return redirect(route('locAttendances.index'));
    }
}
