<?php

namespace App\Http\Controllers;

use App\Cosmonaut\Exception\CosmonautItemNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class CosmonautController
 * @package App\Http\Controllers
 */
class CosmonautController extends Controller
{
    /**
     * Zobrazi zoznam kozmonautov
     * @return View
     */
    public function index(): View
    {
        $cosmonautItems = cosmonautRepository()->getAllItems();

        return view('home.layout.index', compact('cosmonautItems'));
    }

    /**
     * Zobrazi profil kozmonauta
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        try {
            $cosmonautItem = cosmonautRepository()->getItemById($id);
        } catch (CosmonautItemNotFoundException $e) {
            abort('404');
        }

        return view('home.layout.show', compact('cosmonautItem'));
    }

    /**
     * Formular pre vytvorenie kozmonauta
     * @return View
     */
    public function create(): View
    {
        return view('home.layout.create');
    }

    /**
     * Ulozenie kozmonauta do DB
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(): RedirectResponse
    {
        $this->validate(request(), [
            'name' => 'required|string',
            'surname' => 'required|string',
            'date_of_birth' => 'required|date',
            'superpower' => 'required|string',
        ]);

        $cosmonautData = [
            'name' => request('name'),
            'surname' => request('surname'),
            'date_of_birth' => request('date_of_birth'),
            'superpower' => request('superpower')
        ];

        cosmonautRepository()->insertItem($cosmonautData);
        request()->session()->flash('status', 'Kozmonaut bol pridaný.');

        return redirect()->route('cosmonaut.index');
    }

    /**
     * Vymazanie kozmonauta
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        cosmonautRepository()->deleteItem($id);
        request()->session()->flash('status', 'Kozmonaut bol zmazaný.');

        return redirect()->route('cosmonaut.index');
    }

    /**
     * Formular pre upravu kozmonauta
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        try {
            $cosmonautItem = cosmonautRepository()->getItemById($id);
        } catch (CosmonautItemNotFoundException $e) {
            abort('404');
        }

        return view('home.layout.edit', compact('cosmonautItem'));
    }

    /**
     * Ulozenie upravenych dat kozmonauta.
     * @param int $id
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(int $id): RedirectResponse
    {
        $this->validate(request(), [
            'name' => 'required|string',
            'surname' => 'required|string',
            'date_of_birth' => 'required|date',
            'superpower' => 'required|string',
        ]);

        $cosmonautData = [
            'name' => request('name'),
            'surname' => request('surname'),
            'date_of_birth' => request('date_of_birth'),
            'superpower' => request('superpower')
        ];

        cosmonautRepository()->updateItem($id, $cosmonautData);
        request()->session()->flash('status', 'Kozmonaut bol upravený.');

        return redirect()->route('cosmonaut.index');
    }
}
