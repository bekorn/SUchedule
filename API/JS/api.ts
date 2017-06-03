/**
 * Created by Berk on 31.05.2017.
 */

///<reference path="jquery.d.ts"/>

class Betterweb {

    static instance : Betterweb;

    static api() : Betterweb {

        if( Betterweb.instance ) {

            return Betterweb.instance;
        }
        else {

            Betterweb.instance = new Betterweb();
            return Betterweb.instance;
        }
    }

    info = {
        name: "betterweb API for JS",
        version: "0.0.0",
        API_URL : "/API/"
    };

    authentication() {

    }

    get_ss( id : number,
            on_complete? : ( data : JSON ) => any,
            on_error : ( error : object ) => any = ( error ) => { console.log( error['status'], error['error_message'] ); } ) : Promise<JSON> {

        return new Promise( ( resolve, reject ) => {

            $.ajax({
                method: 'POST',
                url: this.info.API_URL + "semester_schedule.api.php",
                data: { id : id },
                success: data => resolve( JSON.parse( data ) ),
                error : ( jqXHR : JQueryXHR, status : string, error_message : string ) => reject({ 'status' : status, 'error_message' : error_message })
            });
        })
        .then( on_complete )
        .catch( on_error );
    }

    get_lts( id : number,
            on_complete? : ( data : JSON ) => any,
            on_error : ( error : object ) => any = ( error ) => { console.log( error['status'], error['error_message'] ); } ) : Promise<JSON> {

        return new Promise<JSON>( ( resolve, reject ) => {

            $.ajax({
                method: 'POST',
                url: this.info.API_URL + "semester_schedule.api.php",
                data: { id : id },
                success: data => resolve( JSON.parse( data ) ),
                error : ( jqXHR : JQueryXHR, status : string, error_message : string ) => reject({ 'status' : status, 'error_message' : error_message })
            });
        })
        .then( on_complete )
        .catch( on_error );
    }

    like_schedule( is_long : number, id : number,
                   on_complete? : ( data : JSON ) => any,
                   on_error : ( error : object ) => any = ( error ) => { console.log( error['status'], error['error_message'] ); } ) : Promise<JSON> {

        return new Promise<JSON>((resolve, reject) => {

            $.ajax({
                method: 'POST',
                url: this.info.API_URL + "like.api.php",
                data: {is_long: is_long, id: id},
                success: data => resolve( JSON.parse( data ) ),
                error : ( jqXHR : JQueryXHR, status : string, error_message : string ) => reject({ 'status' : status, 'error_message' : error_message })
            });
        })
        .then( on_complete )
        .catch( on_error );
    }


    /*      Dom Helpers     */

    append_like_button_events( buttons : JQuery ) {

        buttons.one( 'mousedown', function() {

            let like_counter : JQuery = $(this).next();
            let is_long : number = $(this).data("is_long");
            let id : number = $(this).data("id");

            let promise = Betterweb.api().like_schedule( is_long, id );

            promise.then( ( data : JSON ) => {

                console.log( data );

                if( data['success'] ) {

                    $(this).css( "animation", "like 0.3s ease-in-out forwards" );
                    like_counter.text( Number( like_counter.text() ) + 1 );
                }
                else {

                    console.log( "Error occured" );
                }
            });
        });
    }


}

let api = Betterweb.api();