TUI MUSSEMENT EVALUATION STEP 2 ANSWERS

1. API endpoint to set the weather forecast for a city

	- Endpoint    : /api/v3/cityWeather
	- Http method : PUT
	- Description : sets the weather forecast of a city between two dates
	- Authentication : header token must be sent in request headers to authorize PUT operation
	- Pamatemers  :

     	-> cityId :

     		- Type        : int
     		- Description : id of the city for which the weather is going to be set

     	-> conditions :

     		- Type        : JSON
     		- Description : List of dates and weather condition
     		- Format      :

     			[
	     			{
	     		 		date      : ISO 8601 date (YYYY-MM-DD),
	     		 		condition : 'Text for weather condition'
	     		 	},
	     		    {
	     		 		date      : ISO 8601 date (YYYY-MM-DD),
	     		 		condition : 'Text for weather condition'
	     		 	},
	     		    ...
	     		    {
	     		 		date     : ISO 8601 date (YYYY-MM-DD),
	     		 		forecast : 'Text for weather condition'
	     		 	},
	     		]

     		

     - Response : 

     	-> status : OK -> success / KO -> failure
     	-> data   :

     		- OK Payload : 'success'
	     	- KO Payload : Error message


2. API endpoint to get forecast for a city

	- Endpoint    : /api/v3/cityWeather
	- Http method : GET
	- Description : gets the weather of a city between two dates
	- Authentication : header token must be sent in request headers to authorize GET operation
	- Pamatemers  :

     	-> cityId :

     		- Type        : int
     		- Description : id of the city for which the weather is going to be rerieved

     	-> startDate :

     		- Type        : ISO 8601 date (YYYY-MM-DD)
     		- Description : start date for the weather condition

     	-> endDate :

     		- Type        : ISO 8601 date (YYYY-MM-DD)
     		- Description : end date for the weather condition. Greater or equal than start_date (if this 						condition is not met, error response will be returned)

     - Response : 

     	-> status : OK -> success / KO -> failure
     	-> data   : 

     		- OK Payload:

	     		[
	     			{
	     		 		date      : start_date (YYYY-MM-DD),
	     		 		condition : 'Text for the weather condition'
	     		 	},
	     		    {
	     		 		date      : start_date + 1 day (YYYY-MM-DD),
	     		 		condition : 'Text for the weather condition'
	     		 	},
	     		    ...
	     		    {
	     		 		date      : end_date (YYYY-MM-DD),
	     		 		condition : 'Text for the weather condition'
	     		 	},
	     		]

	     	- KO Payload : Error message