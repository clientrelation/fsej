jQuery(function(t){var a=function(a,s,e){"undefined"!=typeof wysijaLazyLoad&&(StatsFilter.instance.isInProgress=!0,wysijaLazyLoad.options.data=s,wysijaLazyLoad.options.task=e,wysijaLazyLoad.options.filter={from:t("#stats-filter-from").val(),to:t("#stats-filter-to").val(),lastDays:t("#custom-date").val()},wysijaLazyLoad.init(function(t,s){0===s&&(StatsFilter.instance.isInProgress=!1),jQuery(a).append(t.result)}))},s=function(){var a=new StatsFilter({from:t("#stats-filter-from").val(),to:t("#stats-filter-to").val(),lastDays:t("#custom-date").val(),formName:"stats-filter",forceToSortByDesc:!0}),s=!1;t("#stats-filter-from").change(function(e){s||(t("#custom-date").val(0),a.lastDaysChange(t("#custom-date").val())),a.fromChange(e)}),t("#stats-filter-to").change(function(e){s||(t("#custom-date").val(0),a.lastDaysChange(t("#custom-date").val())),a.toChange(e)}),t("#custom-date").change(function(e){s=!0,t("#stats-filter-from").val(t(e.target.options[e.target.selectedIndex]).attr("from")).change(),t("#stats-filter-to").val(t(e.target.options[e.target.selectedIndex]).attr("to")).change(),a.lastDaysChange(e.target.value),s=!1,"0"!=e.target.value&&t("#stats-filter").submit()}),t("#stats-filter").submit(function(t){a.submit(t,wysijaStatisticVars.lazyLoad)}),t(document).on("click",".sort-filter",function(){var s=t(this).hasClass("asc")?"asc":"desc";s="desc"===s?"asc":"desc",t(this).removeClass("desc").removeClass("asc").addClass(s),a.orderDirection=s,a.orderBy=t(this).attr("rel"),a.block=t(this).parents(".container").attr("rel"),a.doFilter(t(this).parents(".container"),wysijaStatisticVars.lazyLoad)}),t(".page-limit").click(function(){a.itemPerPage=parseInt(t(this).html()),a.block=t(this).parents(".container").attr("rel"),a.doFilter(t(this).parents(".container"),wysijaStatisticVars.lazyLoad)}),t(document).on("click",".page-limit",function(){a.itemPerPage=parseInt(t(this).html()),a.block=t(this).parents(".container").attr("rel"),a.doFilter(t(this).parents(".container"),wysijaStatisticVars.lazyLoad)})};if(s(),t(wysijaStatisticVars.filter.datePickerElements).datepicker({dateFormat:wysijaStatisticVars.filter.dateFormat}),wysijaStatisticVars.lazyLoad){var e=jQuery.extend([],wysijaStatisticVars.lazyLoad.lazyLoadBlocks);a(wysijaStatisticVars.lazyLoad.targetContainer,e,wysijaStatisticVars.lazyLoad.task)}});