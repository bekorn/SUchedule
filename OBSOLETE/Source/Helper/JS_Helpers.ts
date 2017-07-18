/**
 * Created by Berk on 05.06.2017.
 */

///<reference path="../../API/JS/jquery.d.ts"/>
///<reference path="../../API/JS/api.ts"/>

let api = Betterweb.api();

let append_like_button_events = function( buttons : JQuery ) {

    buttons.one( 'mousedown', function() {

        let like_counter : JQuery = $(this).next();
        let is_long : number = $(this).data("is_long");
        let id : number = $(this).data("id");

        let promise = api.like_schedule( is_long, id );

        promise.then( ( data : JSON ) => {

            console.log( data );

            if( data['success'] ) {

                $(this).css( "animation", "like 0.3s ease-in-out forwards" );
                like_counter.text( Number( like_counter.text() ) + 1 );
            }
            else {

                console.log( "Error occurred" );
            }
        });
    });
};

/**  These functions used only once, so they moved to inside that modal **/

/*

let login_form_onsubmit = function( event : Event ) {

    let form : JQuery = $( event.target );
    let mail : string = form.children( '#mail' ).val();
    let password : string = form.children( '#password' ).val();

    let error : JQuery = form.children( '.error' );
    error.removeClass( 'active' );
    error.text("");

    let on_success = function( data : object ) {

        if( data['status'] == 'success' ) {

            //  Reload page to load user specific elements
            location.reload();
        }
        else {

            error.text( data['value'] );
            error.addClass( 'active' );
        }
    };

    let request : Promise<object> = api.login( mail, password );
    request.then( on_success );

    //  Prevent Login form from refreshing the page
    event.preventDefault();
    return false;
};

let register_form_onsubmit = function( event : Event ) {

    let form : JQuery = $( event.target );
    let name : string = form.children( '#name' ).val();
    let surname : string = form.children( '#surname' ).val();
    let mail : string = form.children( '#mail' ).val();
    let student_number : string = form.children( '#student_number' ).val();
    let password : string = form.children( '#password' ).val();

    let error : JQuery = form.children( '.error' );
    error.removeClass( 'active' );
    error.text("");

    let on_success = function( data : object ) {

        if( data['status'] == 'success' ) {

            //  If successful, user also logs in
            //  Then reload page to load user specific elements
            location.reload();
        }
        else {

            error.text( data['value'] );
            error.addClass( 'active' );
        }
    };

    let request : Promise<object> = api.register( name, surname, mail, student_number, password );
    request.then( on_success );

    //  Prevent Login form from refreshing the page
    event.preventDefault();
    return false;
};

*/
