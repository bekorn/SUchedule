/**
 * Created by Berk on 31.05.2017.
 */

//  TODO : Implement vanilla AJAX requests and remove JQuery dependency
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
        version: "0.0.0.0",
        API_URL : "/API/"
    };

    /**User Login / Authentication
     *
     * Logs in user. If successful server session is set. Authentication required for further operations granted.
     * May switch to token system in future
     *
     * @param mail
     * @param password
     * @param on_complete
     * @param on_error
     * @returns {Promise<JSON>}
     */
    login( mail : string, password : string,
           on_complete? : ( data : JSON ) => any,
           on_error : ( error : object ) => any = ( error ) => { console.log( error['status'], error['error_message'] ); } ) : Promise<object> {

        return new Promise( ( resolve, reject ) => {

            $.ajax({
                method: 'POST',
                url: this.info.API_URL + "login.api.php",
                data: { mail : mail, password : password },
                success: data => resolve( JSON.parse( data ) ),
                error : ( jqXHR : JQueryXHR, status : string, error_message : string ) => reject({ 'status' : status, 'error_message' : error_message })
            });

        })
        .then( on_complete )
        .catch( on_error );
    }

    logout( on_complete? : ( data : JSON ) => any,
            on_error : ( error : object ) => any = ( error ) => { console.log( error['status'], error['error_message'] ); } ) : Promise<object> {

        return new Promise( ( resolve, reject ) => {

            $.ajax({
                method: 'POST',
                url: this.info.API_URL + "logout.api.php",
                data: {},
                success: data => resolve( JSON.parse( data ) ),
                error : ( jqXHR : JQueryXHR, status : string, error_message : string ) => reject({ 'status' : status, 'error_message' : error_message })
            });

        })
        .then( on_complete )
        .catch( on_error );
    }

    /**New User Registration
     *
     * @param name
     * @param surname
     * @param mail
     * @param student_number
     * @param password
     * @param on_complete
     * @param on_error
     * @returns {Promise<JSON>}
     */
    register( name : string, surname : string, mail : string, student_number : string, password : string,
              on_complete? : ( data : JSON ) => any,
              on_error : ( error : object ) => any = ( error ) => { console.log( error['status'], error['error_message'] ); } ) : Promise<object> {

        return new Promise( ( resolve, reject ) => {

            $.ajax({
                method: 'POST',
                url: this.info.API_URL + "register.api.php",
                data: { name : name,  surname : surname,  mail  : mail, student_number : student_number,  password : password},
                success: data => resolve( JSON.parse( data ) ),
                error : ( jqXHR : JQueryXHR, status : string, error_message : string ) => reject({ 'status' : status, 'error_message' : error_message })
            });

        })
        .then( on_complete )
        .catch( on_error );
    }

    /**Like Schedule
     *
     * @param is_long
     * @param id
     * @param on_complete
     * @param on_error
     * @returns {Promise<JSON>}
     */
    like_schedule( is_long : number, id : number,
                   on_complete? : ( data : object ) => any,
                   on_error : ( error : object ) => any = ( error ) => { console.log( error['status'], error['error_message'] ); } ) : Promise<object> {

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



    /*  Schedule Getters  */

    /**Get the Semester Schedule with matching id
     *
     * @param id
     * @param on_complete
     * @param on_error
     * @returns {Promise<Object>}
     */
    get_ss( id : number,
            on_complete? : ( data : object ) => any,
            on_error : ( error : object ) => any = ( error ) => { console.log( error['status'], error['error_message'] ); } ) : Promise<object> {

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

    /**Get the Long Term Schedule with matching id
     *
     * @param id
     * @param on_complete
     * @param on_error
     * @returns {Promise<Object>}
     */
    get_lts( id : number,
            on_complete? : ( data : object ) => any,
            on_error : ( error : object ) => any = ( error ) => { console.log( error['status'], error['error_message'] ); } ) : Promise<object> {

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

}