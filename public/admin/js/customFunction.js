// $.noConflict();
// jQuery(document).ready(function ($) {
//   $("#addmanualOrder").validate({
//     rules: {
//           fname: {
//               required: true,
//           },
//           lname: {
//             required: true,
//         },
//         email: {
//             required: true,
//         },
//         phone: {
//             required: true,
//         },
//         address: {
//             required: true,
//         },
//         state: {
//             required: true,
//         },
//         city: {
//             required: true,
//         },
//         pincode: {
//             required: true,
//         },
//         country: {
//               required: true,
//               //email: true
//           }
//       },
//       messages: {
//           email: {
//               required: "Please enter a username",
//               // minlength: "Username must be at least 3 characters",
//               // maxlength: "Username cannot exceed 20 characters"
//           },
//           password: {
//               required: "Please enter password",
//               //email: "Please enter a valid email address"
//           },
//       },
//       submitHandler: function(form) {
//                 $.ajax({
//                   url: "action.php",
//                   type: "post",
//                   data: new FormData(form),
//                   contentType: false,
//                   cache: false,
//                   processData: false,
//                   success: function (data) {
//                     if(data=='done'){				
//                       alert("Login Successfully");
//                      // window.location = "https://admin.houseofsneakers.in/home.php";
//                       window.location = "http://localhost/getlifePharma/home.php";
//                       }
//                       else{
//                         alert("Wrong Credentials")
//                       }

//                   },
//                 });        
//           }
//   });
// });

