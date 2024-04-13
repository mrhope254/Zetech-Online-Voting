const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

// Sign-up vars
const nextOne = document.getElementById("next-1");
const nextTwo = document.getElementById("next-2");
const backOne = document.getElementById("back-1");
const backTwo = document.getElementById("back-2");
const signUp = document.getElementById("sign-up");

const secOne = document.querySelector(".section-1");
const secTwo = document.querySelector(".section-2");
const secThree = document.querySelector(".section-3");
const inputEl = document.querySelector("input");



// Toggle Sign-up and Sign-in
signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


//  Sign - up form

    nextOne.addEventListener('click', (e) =>{
			e.preventDefault();

				secOne.style.display = 'none';
			    secTwo.style.display = 'block';
			
       });


    nextTwo.addEventListener('click', (e) =>{
			e.preventDefault();
			secOne.style.display = 'none';
			secTwo.style.display = 'none';
			secThree.style.display ='block';
	});


	backOne.addEventListener('click', (e) =>{
			e.preventDefault();
			secOne.style.display = 'block';
			secTwo.style.display = 'none';
			secThree.style.display ='none';
		});

	backTwo.addEventListener('click', (e) =>{
			e.preventDefault();
			secOne.style.display = 'none';
			secTwo.style.display = 'block';
			secThree.style.display ='none';
		});


