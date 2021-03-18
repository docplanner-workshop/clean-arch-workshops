**Clean Code Architecture Workshops - ADR Example**

_Starting Project_

You need Docker and docker-compose to properly run this project (or configure it yourself using your local env)

There is a Makefile that encapsulates raw commands. So make sure you have `make` installed. Or use the raw commands defined in the Makefile :)

_Starting Project_

`make start-containers-with-install`

_Running tests_

`make run-tests`

Project will be available at `localhost:8095`

_There is one example endpoint that you can check out_
`localhost:8095/example/square/{integer}, for example localhost:8095/example/square/10`


_Task_


Implement an Action that allows you to Book a Visit at Doctor with Action-Domain-Responder Pattern.

Functional Requirements
You have to return an info to the client if validation fails (annotations)
You have to return a created booking id and visit length
Make it possible to get response as xml (when header Accept is “application/xml”

Additional (if you implement the above):
Make a command to create a booking from console that uses the same action
If you have time, implement logic that visits cannot overlap


Do not worry about authentication or authorization: you can mock services that are responsible for these stuff, or take the approach that a system that is connected through Api can make any possible booking.
