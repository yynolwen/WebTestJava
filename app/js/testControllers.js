var app = angular.module('app', []);


app.service('userAnswerService', function() {

	var service =  this;

	var userAnswers;

	service.setUserAnswers = function (uAnswers) {
		service.userAnswers = uAnswers;
	};

	service.getUserAnswers = function (){
		return service.userAnswers;
	};
});


/*
app.controller('testCtrl', function ($scope, $http, $location) {
	$scope.tests = [{"id":"1","subject":"Which interface provides the capability to store objects using a key-value pair?","answer":"A","choices":[{"id":"A","questionId":"1","subject":"Java.util.Map"},{"id":"B","questionId":"1","subject":"Java.util.Set"},{"id":"C","questionId":"1","subject":"Java.util.List"},{"id":"D","questionId":"1","subject":"Java.util.Collection"}]},{"id":"2","subject":"Which one is NOT a java\/j2ee framework?","answer":"D","choices":[{"id":"A","questionId":"2","subject":"Strut"},{"id":"B","questionId":"2","subject":"Spring"},{"id":"C","questionId":"2","subject":"Hibernate"},{"id":"D","questionId":"2","subject":"Symfony"}]},{"id":"3","subject":"Which one is NOT a database written by java","answer":"C","choices":[{"id":"A","questionId":"3","subject":"HSQDB"},{"id":"B","questionId":"3","subject":"H2"},{"id":"C","questionId":"3","subject":"MongoDB"},{"id":"D","questionId":"3","subject":"HBASE"}]},{"id":"4","subject":"public class Test { }What is the prototype of the default constructor?","answer":"C","choices":[{"id":"A","questionId":"4","subject":"Test()"},{"id":"B","questionId":"4","subject":"Test(void)"},{"id":"C","questionId":"4","subject":"public Test()"},{"id":"D","questionId":"4","subject":"public Test(void)"}]},{"id":"5","subject":"Which is valid declaration of a float?","answer":"A","choices":[{"id":"A","questionId":"5","subject":"float f = 1F;"},{"id":"B","questionId":"5","subject":"float f = 1.0;"},{"id":"C","questionId":"5","subject":"float f = \"1\";"},{"id":"D","questionId":"5","subject":"float f = 1.0d;"}]},{"id":"6","subject":"You want a class to have access to members of another class in the same package. Which is the most restrictive access that accomplishes this objective?","answer":"D","choices":[{"id":"A","questionId":"6","subject":"public"},{"id":"B","questionId":"6","subject":"private"},{"id":"C","questionId":"6","subject":"protected"},{"id":"D","questionId":"6","subject":"default access"}]},{"id":"7","subject":"public class Outer\n{ \n public void someOuterMethod() \n {\n \/\/Line 5 \n } \n public class Inner { } \n public static void main(String[] argv) \n {\n Outer ot = new Outer(); \n \/\/Line 10\n } \n} \nWhich of the following code fragments inserted, will allow to compile?","answer":"A","choices":[{"id":"A","questionId":"7","subject":"new Inner(); \/\/At line 5"},{"id":"B","questionId":"7","subject":"new Inner(); \/\/At line 10"},{"id":"C","questionId":"7","subject":"new ot.Inner(); \/\/At line 10"},{"id":"D","questionId":"7","subject":"new Outer.Inner(); \/\/At line 10"}]},{"id":"8","subject":"Which is a valid keyword in java?","answer":"A","choices":[{"id":"A","questionId":"8","subject":"interface"},{"id":"B","questionId":"8","subject":"string"},{"id":"C","questionId":"8","subject":"float"},{"id":"D","questionId":"8","subject":"unsigned"}]},{"id":"9","subject":"switch(x) { default: System.out.println(\"Hello\"); }Which two are acceptable types for x?\t1\tbyte\t2\tlong\t3\tchar\t4\tfloat\t5\tShort\t6\tLong","answer":"A","choices":[{"id":"A","questionId":"9","subject":"1 and 3"},{"id":"B","questionId":"9","subject":"2 and 4"},{"id":"C","questionId":"9","subject":"3 and 5"},{"id":"D","questionId":"9","subject":"4 and 6"}]},{"id":"10","subject":"Java 8: What's the output of this code:\nArrays.stream(new int[] {1, 2, 3})\n .map(n -> 2 * n + 1)\n .average()\n .ifPresent(System.out::println); ","answer":"A","choices":[{"id":"A","questionId":"10","subject":"5"},{"id":"B","questionId":"10","subject":"10"},{"id":"C","questionId":"10","subject":"2"},{"id":"D","questionId":"10","subject":"12"}]}];
	//$scope.choices = new Array();
	$scope.choices = [];
	$scope.count = 0;
	$scope.removeQuestion = function(test,question,choice) {
		var i = $scope.tests.indexOf(test);
		//var quesAns = { 'question': question, 'answer': choice };
		//$scope.choices.push(choice);

		$scope.choices[question]=choice;

		console.log($scope.choices);

		$scope.count++;
		$scope.tests.splice(i, 1);


	};
	$scope.insertData=function (path) {
		if($scope.nom && $scope.email && $scope.phone && $scope.orga && $scope.count==10){
			s = JSON.stringify( $scope.choices );

			$http.post("./php/question/ws/insert.php",{'nom':$scope.nom,'email':$scope.email,'phone':$scope.phone,'orga':$scope.orga,'cx': s})
				.success(function (data,status,headers,config) {
					console.log("data inserted successfully");
					$location.path(path);
				})};
	}

});
*/

app.controller('QuestionController', function (userAnswerService, $http, $location) {

	var vm = this;

	//exposer les methodes et variables
	vm.answerQuestion = answerQuestion;

	var result;
	var userResponses;

	function init(){

		$http.get("http://localhost:63342/JavCha/php/question/ws/QuestionWs.php")
			.success(function(response) {
				result=response;
				vm.currentQindex=0;
				vm.currentQ = result.questions[vm.currentQindex];
				userResponses = [];
			});

	}


	function answerQuestion(idChoice,path){

		userResponses[vm.currentQ.id] = idChoice;

		if(vm.currentQindex < result.questions.length -1 ){
			vm.currentQindex ++;
			vm.currentQ = result.questions[vm.currentQindex];
		}else{
			userAnswerService.setUserAnswers(userResponses);
			$location.path(path);
		}

	}

	init();

});

app.controller('PersoInfoFormController', function (userAnswerService, $scope, $http, $location) {

	var vm = this;

	vm.submitData = submitData;

	function init(){
		//console.log(userAnswerService.getUserAnswers());
	}

	function submitData(path) {
		userAnswers = JSON.stringify(userAnswerService.getUserAnswers());
		$http.post("./php/question/ws/submit.php",{'nom':$scope.nom,'email':$scope.email,'phone':$scope.phone,'orga':$scope.orga,'userAnswers':userAnswers})
			.success(function (data,status,headers,config) {
				//console.log("data inserted successfully");
				$location.path(path);
			})};


	init();

});
