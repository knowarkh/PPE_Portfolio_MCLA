$( document ).ready(function() {
                
                $("#about_scroll").fadeOut();   
                $("#competences_scroll").fadeOut();
                $("#projets_scroll").fadeOut();
                $("#contact_scroll").fadeOut();

                $("#about").click(function(){
                    $("#index").fadeOut();
                    $("#about_scroll").fadeIn();
                    $('#about_left').addClass('animated slideInLeft');
                    $('#about_right').addClass('animated slideInRight');
                    });
                $("#competences").click(function(){
                    $("#index").fadeOut();
                    $("#competences_scroll").fadeIn();
                    $('#competences_left').addClass('animated slideInLeft');
                    $('#competences_right').addClass('animated slideInRight');
                    });
                $("#projets").click(function(){
                    $("#index").fadeOut();
                    $("#projets_scroll").fadeIn();
                    $('#projets_left').addClass('animated slideInLeft');
                    $('#projets_right').addClass('animated slideInRight');
                    });
                $("#contact").click(function(){
                    $("#index").fadeOut();
                    $("#contact_scroll").fadeIn();
                    $('#contact_left').addClass('animated slideInLeft');
                    $('#contact_right').addClass('animated slideInRight');
                    });
                
                $(".back").click(function(){
                    $(".pages").fadeOut();
                    $("#index").fadeIn();
                    $('#index_left').addClass('animated slideInLeft');
                    $('#index_right').addClass('animated slideInRight');
                    });
           
		});