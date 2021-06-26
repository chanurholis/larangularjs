myApp.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

myApp.controller('myCtrl', function($scope, $http, API_URL) {
    // Fetch contacts listing from
    $http({
        method: 'GET',
        url: API_URL + "contacts"
    }).then(function (response) {
        $scope.contacts = response.data.contacts;
        console.log(response);
    }, function (error) {
        console.log(error);
        alert('This is embarassing. An error has occurred. Please check the log for details');
    })

    // Show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;
        $scope.contact    = null;

        switch (modalstate) {
            case 'add':
                $scope.form_title = 'Add New Contact';
                break;
            case 'edit':
                $scope.form_title = 'Contact Detail';
                $scope.id = id;
                $http.get(API_URL + 'contact/' + id)
                    .then(function (response) {
                        console.log(response);
                        $scope.contact = response.data.contact;
                    });
                break;
            default:
                break;
        }

        console.log(id);
        $('#myModal').modal('show');
    }

    // Save new record and update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + 'contact';
        var method = 'POST';

        // Append contact id to the URL if the form is in edit mode
        if (modalstate == 'edit') {
            url =+ "/" + id;
            method = 'PUT';
        }

        $http({
            method: method,
            url: url,
            data: $.param($scope.contact),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function(response) {
            console.log(response);
            location.reload();
        }), (function (error) {
            console.log(error);
            alert('This is embarassing. An error has occurred. Please check the log for details');
        });
    }

    // Delete record
    $scope.confirmDelete = function (id) {
        var isConfirmDelete = confirm('Are you sure?');

        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'contact/' + id
            }).then(function (response) {
                console.log(response);
                location.reload();
            }, function (error) {
                console.log(error);
                alert('Unable to delete');
            })
        } else {
            return false;
        }
    }
});
