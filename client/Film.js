var mod=angular.module('GetRatingApp',[]);
mod.controller('GetRatingController',function($scope, $http){
    $scope.Table = undefined;
    $scope.addMovie=function(){
    
        let data = {
            'film_id' : $scope.fID,
            'film_name': $scope.fName,
            'film_genre': $scope.fGenre,
            'film_studio' : $scope.fStudio,
            'film_director' : $scope.fDirector,
            'film_producer' : $scope.fProducer,
            'film_lead' : $scope.fLeadActor
        };
        
        let url = "http://localhost/films/insert.php";

        $http.post(url, data)
        .then(function(response){
            alert('Movie added successfully!')
            console.log(response.data);
            $scope.fID=null;
            $scope.fName=null;
            $scope.fGenre=null;
            $scope.fStudio=null;
            $scope.fDirector=null;
            $scope.fProducer=null;
            $scope.fLeadActor=null;
            // console.log('Insertion Successful');
        }, function(error){
            console.log(error);
            // console.log('Insertion Unsuccessful'); 
        });
    };
    $scope.updateMovie=function(){
        //alert('Updating Selected Movie!');

        let data = {
            'film_id' : $scope.fID,
            'film_name': $scope.fName,
            'film_genre': $scope.fGenre,
            'film_studio' : $scope.fStudio,
            'film_director' : $scope.fDirector,
            'film_producer' : $scope.fProducer,
            'film_lead' : $scope.fLeadActor
        };
        
        let url = "http://localhost/films/update.php";

        $http.post(url, data)
        .then(function(response){
            console.log(response.data);

            $scope.fID=null;
            $scope.fName=null;
            $scope.fGenre=null;
            $scope.fStudio=null;
            $scope.fDirector=null;
            $scope.fProducer=null;
            $scope.fLeadActor=null;
            // console.log('Insertion Successful');
        }, function(error){
            console.log(error);
            // console.log('Insertion Unsuccessful'); 
        });
    };
    $scope.deleteMovie=function(){
        let dec=confirm('Are you sure you want to delete?');
        if(dec) {
            let data = {
                'film_id' : $scope.fID,
            };
            
            let url = "http://localhost/films/delete.php";

            $http.post(url, data)
            .then(function(response){
                console.log(response.data);

                $scope.fID=null;
                $scope.fName=null;
                $scope.fGenre=null;
                $scope.fStudio=null;
                $scope.fDirector=null;
                $scope.fProducer=null;
                $scope.fLeadActor=null;
                // console.log('Insertion Successful');
            }, function(error){
                console.log(error);
                // console.log('Insertion Unsuccessful'); 
            });
        }
    
    };

    $scope.displayMovie=function(){
        if($scope.fID==null)
            alert('Enter Film ID');
        else
        {
            $scope.dispTable=true;
            $scope.dispMovie=false;    
            
            let data = {
                'film_id' : $scope.fID,
            };
            
            let url = "http://localhost/films/display.php";

            $http.post(url, data)
            .then(function(response){
                $scope.Table=response.data[0];
                console.log(response.data[0]);
                // console.log('Insertion Successful');
            }, function(error){
                console.log(error);
                // console.log('Insertion Unsuccessful'); 
            });
        }
        
    };

    $scope.displayAllMovies=function(){
        $scope.dispTableAll=true;
        $scope.dispMovie=false;    
        
        let data = {};
        
        let url = "http://localhost/films/displayAll.php";

        $http.post(url, data)
        .then(function(response){
            $scope.TableAll=response.data;
            //console.log(response.data);
            // console.log('Insertion Successful');
        }, function(error){
            console.log(error);
            // console.log('Insertion Unsuccessful'); 
        });
    };

});