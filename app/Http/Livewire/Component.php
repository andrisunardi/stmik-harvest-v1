<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\BuyEndorse;
use App\Models\Career;
use App\Models\Faq;
use App\Models\Game;
use App\Models\History;
use App\Models\News;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PriceList;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Livewire\Component as LivewireComponent;

class Component extends LivewireComponent
{
    public function boot()
    {
        $this->totalGame = Game::active()->cursor()->count();
        View::share('totalGame', $this->totalGame);

        $this->totalNews = News::active()->cursor()->count();
        View::share('totalNews', $this->totalNews);

        $this->totalBlog = Blog::active()->cursor()->count();
        View::share('totalBlog', $this->totalBlog);

        $this->totalQuote = Quote::active()->cursor()->count();
        View::share('totalQuote', $this->totalQuote);

        $this->totalHistory = History::active()->cursor()->count();
        View::share('totalHistory', $this->totalHistory);

        $this->totalTeam = User::whereIn('access_id', ['1', '2', '3', '4', '5', '6'])->where('id', '!=', '10')->active()->cursor()->count();
        View::share('totalTeam', $this->totalTeam);

        $this->totalTestimonial = Portfolio::whereNotNull('testimonial')->cursor()->count();
        View::share('totalTestimonial', $this->totalTestimonial);

        $this->totalEndorsement = BuyEndorse::active()->cursor()->count();
        View::share('totalEndorsement', $this->totalEndorsement);

        $this->totalCareer = Career::active()->cursor()->count();
        View::share('totalCareer', $this->totalCareer);

        $this->totalPortfolio = Portfolio::publish()->active()->cursor()->count();
        View::share('totalPortfolio', $this->totalPortfolio);

        $this->totalPortfolioCategory = PortfolioCategory::active()->cursor()->count();
        View::share('totalPortfolioCategory', $this->totalPortfolioCategory);

        $this->totalPriceList = PriceList::active()->cursor()->count();
        View::share('totalPriceList', $this->totalPriceList);

        $this->totalFaq = Faq::active()->cursor()->count();
        View::share('totalFaq', $this->totalFaq);

        $this->totalClient = Portfolio::distinct('user_id')->cursor()->count();
        View::share('totalClient', $this->totalClient);

        $this->experience = date('Y') - env('APP_YEAR');
        View::share('experience', $this->experience);
    }
}
