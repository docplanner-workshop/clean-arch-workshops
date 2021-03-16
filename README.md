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
`localhost:8095/example/action/{integer}, for example localhosot:8095/example/action/10`
