// document.getElementById('parent_cat').addEventListener('change', function() {
//     var parentCatId = $(this).find(':selected').data('parent_id');
//     fetch('/get-subcategories/' + parentCatId)
//         .then(response => response.json())
//         .then(data => {
//             // Clear existing options
//             document.getElementById('sub_cat').innerHTML = '<option value="">Select a subcategory</option>';
//             // Add fetched subcategories as options
//             data.forEach(subcategory => {
//                 var option = document.createElement('option');
//                 option.value = subcategory.categorySlug;
//                 option.textContent = subcategory.categoryName;
//                 document.getElementById('sub_cat').appendChild(option);
//             });
//         })
//         .catch(error => console.error('Error:', error));
// });
// import 'jquery-nice-select';

// document.addEventListener("DOMContentLoaded", function() {
//     var parentCatElement = document.getElementById('parent_cat');
    
//     if (parentCatElement) {
//         parentCatElement.addEventListener('change', function() {
//             // Get the data-parent_id attribute from the selected option
//             var parentCatId = this.options[this.selectedIndex].getAttribute('data-parent_id');
            
//             // Fetch subcategories based on the selected parent category
//             fetch('/get-subcategories/' + parentCatId)
//                 .then(response => response.json())
//                 .then(data => {
//                     // Clear existing options in subcategory dropdown
//                     var subCatElement = document.getElementById('sub_cat');
//                     subCatElement.innerHTML = '<option value="">Select a subcategory</option>';
                    
//                     // Populate subcategories dynamically
//                     data.forEach(subcategory => {
//                         var option = document.createElement('option');
//                         option.value = subcategory.categorySlug;
//                         option.textContent = subcategory.categoryName;
//                         subCatElement.appendChild(option);
//                     });
//                 })
//                 .catch(error => console.error('Error:', error));
//         });
//     } else {
//         // console.error("Element with ID 'parent_cat' not found in the DOM.");
//     }
// });




/* Full Screen */
const fullscreenButton = document.getElementById('crancy-header__full');
const htmlElement = document.documentElement;

if (fullscreenButton) {
    fullscreenButton.addEventListener('click', () => {
        if (document.fullscreenElement) {
            document.exitFullscreen();
        } else {
            htmlElement.requestFullscreen();
        }
    });
}

/* Password Field */
document.addEventListener('DOMContentLoaded', function() {
    const passwordField = document.getElementById('password-field');
    const toggleIcon = document.getElementById('toggle-icon');
    const togglePassword = () => {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    };
    
    if (toggleIcon) {
        toggleIcon.addEventListener('click', togglePassword);
    }
});



// /* Crancy Options */
const cs_button = document.querySelectorAll("#crancy__sicon");
const cs_action = document.querySelectorAll(".crancy-smenu, .crancy-header, .crancy-adashboard");

cs_button.forEach(button => {
   button.addEventListener("click", function() {
        cs_action.forEach((el) => {
           el.classList.toggle("crancy-close");
        });
        localStorage.setItem("iscicon", cs_action[0].classList.contains("crancy-close"));
    });
 });

if (localStorage.getItem("iscicon") === "true") {
   cs_action.forEach((el) => {
       el.classList.add("crancy-close");
   });
}


document.addEventListener("DOMContentLoaded", function() {
    const crancyDropdowns = document.querySelectorAll(".crancy__dropdown");

    crancyDropdowns.forEach((crancyDropdown, index) => {
        const observer = new MutationObserver(function(mutationsList) {
            const crancyDropdownHasShowClass = crancyDropdown.classList.contains("show");
            
            document.querySelectorAll(".admin-menu").forEach((adminMenuOne) => {
                adminMenuOne.classList.toggle("no-overflow", crancyDropdownHasShowClass);
            });
        });

        observer.observe(crancyDropdown, { attributes: true });
    });
});

// jQuery(document).ready(function($) {

// 		$('#crancy-header__nav,.crancy-sidebarmenu__close').on( "click", function(){
// 			$('.crancy-sidebarmenu').toggleClass('active');
// 		});	
//         /*====================================
// 			Select2 JS
// 		======================================*/ 
// 		$('select').niceSelect();
// });
