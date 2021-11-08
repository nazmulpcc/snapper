<?php

namespace App\Http\Controllers;

use HeadlessChromium\BrowserFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', ['file' => 'B6XyOGckN0WpPS5z']);
    }

    public function snap(Request $request)
    {
        $this->validate($request, [
            'url' => 'required'
        ]);
        $browserFactory = new BrowserFactory('/usr/bin/chromium');

        $browser = $browserFactory->createBrowser();

        $file = Str::random(16);

        try {
            $page = $browser->createPage();
            $page->navigate($request->input('url'))->waitForNavigation();

            // $pageTitle = $page->evaluate('document.title')->getReturnValue();

            $page->screenshot()->saveToFile(storage_path("app/public/images/{$file}.png"));

            $options = [
                'landscape'           => true,             // default to false
                'printBackground'     => true,             // default to false
                'displayHeaderFooter' => true,             // default to false
                'preferCSSPageSize'   => true,             // default to false ( reads parameters directly from @page )
                'marginTop'           => 0.0,              // defaults to ~0.4 (must be float, value in inches)
                'marginBottom'        => 1.4,              // defaults to ~0.4 (must be float, value in inches)
                'marginLeft'          => 5.0,              // defaults to ~0.4 (must be float, value in inches)
                'marginRight'         => 1.0,              // defaults to ~0.4 (must be float, value in inches)
                'paperWidth'          => 6.0,              // defaults to 8.5 (must be float, value in inches)
                'paperHeight'         => 6.0,              // defaults to 8.5 (must be float, value in inches)
                'headerTemplate'      => '<div>foo</div>', // see details above
                'footerTemplate'      => '<div>foo</div>', // see details above
                'scale'               => 1.2,              // defaults to 1.0 (must be float)
            ];

            $page->pdf(['printBackground' => false])
                ->saveToFile(storage_path("app/public/pdf/{$file}.pdf"));
        } finally {
            $browser->close();
        }

        return view('welcome', compact('file'));
    }
}
