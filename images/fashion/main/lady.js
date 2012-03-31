
$(document).ready(function() {
    //nav 
    $('.type .subnav').hover(function() {
        $('.m_nav').hide();
        $('.type .subnav').removeClass('on');
        //$(this).addClass('on');
        $(this).parent().find('.m_nav').show();
    });
    $('.type .m_nav').mouseleave(function() {
        $('.m_nav').hide();
        $('.type .subnav').removeClass('on');
    });
    $('.fashion_nav').mouseleave(function() {
        $('.m_nav').hide();
        $('.type .subnav').removeClass('on');
    });

    //tab
    //        $('.hdtab li').mouseenter(function() {
    //            var i = $(this).index(); var id = $(this).parent().attr('id'); var c = $('#' + id + '_cont .lbox');
    //            $(this).parent().find('li').not($(this).addClass('on')).removeClass('on');
    //            c.not($(c.get(i)).show(0)).hide(0);
    //        });

    //tab
    $('.hdtab').each(function() {
        var eachobj = $(this);
        eachobj.find('li').mouseenter(function() {
            var i = $(this).index(); var id = $(this).parent().attr('id'); var c = $('#' + id + '_cont .list');
            $(this).parent().find('li').not($(this).addClass('on')).removeClass('on');
            c.not($(c.get(i)).show(0)).hide(0);
        });
    });

    $('.focus .go_left').click(function() {
        var prev = $('#focus li.on').prev();
        if (prev.length == 0) {
            prev = $('#focus li').last();
        }
        prev.mouseenter();
    });

    $('.focus .go_right').click(function() {
        var next = $('#focus li.on').next();
        if (next.length == 0) {
            next = $('#focus li').first();
        }
        next.mouseenter();
    });
    //switch class
    $.switchClass = function(children, btn_next, btn_prev) {
        children.addClass('sw');
        btn_next.click(function() {
            children.each(function(i, o) {
                $(this).data('class', $(this).attr('class'));
                var next = $(o).next('.sw');
                var className = next.attr('class');
                if (next.length == 0) {
                    next = children.first();
                    className = next.data('class');
                }
                $(o).attr('class', className);
            });
        });
        btn_prev.click(function() {
            children.each(function(i, o) {
                $(o).data('class', $(o).attr('class'));
            })
            children.each(function(i, o) {
                var prev = $(o).prev('.sw');
                var className = prev.data('class');
                if (prev.length == 0) {
                    prev = children.last();
                    className = prev.attr('class');
                }
                $(o).attr('class', className);
            });
        });
    };
    $.switchClass($('.mode1 .sw'), $('.mode1 .go_right'), $('.mode1 .go_left'));
});
