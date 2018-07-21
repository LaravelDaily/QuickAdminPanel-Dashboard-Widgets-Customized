<div class="row">
    <div class="col-xs-3">
        <div class="widget">
            <div class="widget__logo widget-blue">
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
            </div>
            <div class="widget__info">
                <div class="widget__info__header">
                    This month's expenses
                </div>
                <div class="widget__info__data">
                    $ {{ $infoData['currentMonthExpenses'] }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="widget">
            <div class="widget__logo widget-red">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
            </div>
            <div class="widget__info">
                <div class="widget__info__header">
                    This month's income
                </div>
                <div class="widget__info__data">
                    $ {{ $infoData['currentMonthIncome'] }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="widget">
            <div class="widget__logo widget-green">
                <i class="fa fa-level-down" aria-hidden="true"></i>
            </div>
            <div class="widget__info">
                <div class="widget__info__header">
                    This year's expenses
                </div>
                <div class="widget__info__data">
                    $ {{ $infoData['currentYearExpenses'] }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="widget">
            <div class="widget__logo widget-orange">
                <i class="fa fa-level-up" aria-hidden="true"></i>
            </div>
            <div class="widget__info">
                <div class="widget__info__header">
                    This year's income
                </div>
                <div class="widget__info__data">
                    $ {{ $infoData['currentYearIncome'] }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .widget {
        display: flex;
        background-color: #FFFFFF;
        box-shadow: 1px 1px #F1F3F8;
    }

    .widget-blue {
        background-color: #02C0EF;
    }

    .widget-orange {
        background-color: #F3A428;
    }

    .widget-green {
        background-color: #19AD68;
    }

    .widget-red {
        background-color: #DF5B4B;
    }

    .widget__logo {
        color: #D2D6DE;
        margin-right: 15px;
        width: 20%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .widget__logo i {
        padding: 15px;
        font-size: 4rem;
    }

    .widget__info {
        font-size: 1.5rem;
    }

    .widget__info__header {
        font-weight: 400;
        text-transform: uppercase;
    }

    .widget__info__data {
        font-weight: bold;
    }
</style>