function more_course( event ) : void {
    let more_button = event.target;
    let course = more_button.parentElement;

    more_button.classList.toggle('active');
    course.classList.toggle('active');

    let delay = window.getComputedStyle( course ).getPropertyValue('--transition-time');
    let delay_num = Number( delay.substr(0, delay.length-1) ) * 1000 -100;

    window.setTimeout( () => {
        course.nextElementSibling.classList.toggle('active')
    }, delay_num);
}

window.onload = () => {
    let more_course_buttons = document.querySelectorAll('section.course_card > .more');
    
    more_course_buttons.forEach( element => {
        element.addEventListener( 'click', more_course );
    });
};