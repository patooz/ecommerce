$(function(){
    $(document).on('click', '#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
    });
});


/// confirm order ///
$(function(){
    $(document).on('click', '#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Confirmed!',
                'Order Confirmed',
                'success'
                )
            }
            })
    });
});


/// process order ///
$(function(){
    $(document).on('click', '#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Process Order!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Processing!',
                'Order Processed',
                'success'
                )
            }
            })
    });
});


/// picked order ///
$(function(){
    $(document).on('click', '#picked',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update to Picked!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Picked!',
                'Order Updated',
                'success'
                )
            }
            })

    });
});

/// shipped order ///
$(function(){
    $(document).on('click', '#shipped',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Ship Order'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Shipped!',
                'Order Shipped',
                'success'
                )
            }
            })

    });
});

/// delivered order ///
$(function(){
    $(document).on('click', '#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Deliver Order'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Delivered!',
                'Order Delivered',
                'success'
                )
            }
            })

    });
});

/// cancel order ///
$(function(){
    $(document).on('click', '#cancel',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Cancel Order'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Canceled!',
                'Order Canceled',
                'success'
                )
            }
            })

    });
});

/// Delete Admin User ///
$(function(){
    $(document).on('click', '#deleteAdminUser',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete Admin User'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Deleted!',
                'Admin User Deleted',
                'success'
                )
            }
            })

    });
});

/// Delete Admin User ///
$(function(){
    $(document).on('click', '#deleteTestimonial',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete Testimonial'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Deleted!',
                'Testimonial Deleted',
                'success'
                )
            }
            })

    });
});


/// restore deleted order ///
$(function(){
    $(document).on('click', '#restore',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Restore Order'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Restored!',
                'Order Restored',
                'success'
                )
            }
            })

    });
});


/// restore canceled order ///
$(function(){
    $(document).on('click', '#restoreToPending',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Restore Order To Pending'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Restored!',
                'Order Restored To Pending',
                'success'
                )
            }
            })

    });
});


/// soft delete order ///
$(function(){
    $(document).on('click', '#softDeleteOrder',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete Order'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Deleted!',
                'Order Deleted Successfully',
                'success'
                )
            }
            })

    });
});

//toggle password
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    if (togglePassword) {


    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('fa-eye-slash');
        })};
// prevent form submit
    // const form = document.querySelector("form");
    // form.addEventListener('submit', function (e) {
    //     e.preventDefault();
    // });


 $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
             $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });

        $('#ima').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
             $('#showIma').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });








