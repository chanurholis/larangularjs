<!doctype html>
<html lang="en" ng-app="myApp">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Contacts</title>
    </head>
    <body>
        <div class="container" ng-controller="myCtrl">
            <header>
                <h2>Contacts</h2>
            </header>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>
                                <button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New item</button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="contact in contacts">
                            <td>[[ contact.id ]]</td>
                            <td>[[ contact.name ]]</td>
                            <td>[[ contact.phone ]]</td>
                            <td>
                                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', contact.id)">Edit</button>
                                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(contact.id)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">[[ form_title ]]</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="frmitems" class="form-horizontal" novalidate="">
                                <div class="form-group error">
                                    <label for="name" class="col-sm-12 control-label">Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Name" value="[[ name ]]" ng-model="contact.name" ng-required="true">
                                        <small><span class="help-inline text-danger" ng-show="frmitems.name.$invalid && frmitems.name.$touched">Name field is required</span></small>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="col-sm-12 control-label">Phone</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="[[ phone ]]" ng-model="contact.phone" ng-required="true">
                                        <small><span class="help-inline text-danger" ng-show="frmitems.phone.$invalid && frmitems.phone.$touched">Phone number field is required</span></small>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmitems.$invalid">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-animate.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-route.min.js"></script>

        <!-- AngularJS Application Scripts -->
        <script src="{{ asset('app/js/directives/myApp.js') }}"></script>
        <script src="{{ asset('app/js/controllers/myCtrl.js') }}"></script>
    </body>
</html>
