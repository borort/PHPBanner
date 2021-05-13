
# Task
A product manager at xxx has a great idea! Let’s add banners to the xxx app. We need some way of controlling when the banners are displayed. Design and implement a system to accomplish this according to the following specifications.

# Requirements
* You may code in any of the following languages
    * **PHP, Go**
* We’re looking for a clean implementation and a well designed architecture.
* Please use a stable modern version of your chosen language. (e.g. PHP7)
* Please follow modern coding standards/rules. (e.g. PSR)
* Use a dependency management tool to manage your dependencies if utilizing public packages. (e.g. Composer for PHP)
* Feel free to utilize your chosen language’s standard library/modern, appropriate packages.
* Your solution should be well tested. It should also include documentation on how to run the tests.
* **Please do not implement a web application.** Your solution should consist only of classes or packages that might be instantiated in the view layer of an application. It should **NOT** include a front end or any controller code.
* You should **NOT** implement a database layer, but your solution should be written in a way that is easily adapted to work with one in the future.
* Please attach any comments related to your thought process, concerns you had etc. in a README.md file.

## Specifications
* Banner Display Rules
    * Each banner will only run for a specific period of time.
    * Ensure the display period can be set individually for each banner.
    * If the current time is within the display period, display the banner.
    * The banner display rules should be timezone aware.
* Internal Release & QA Considerations
    * We’d like to display the banner if the user has an internal IP address (10.0.0.1, 10.0.0.2), regardless of its display period.
    * After a banner expires, it should not be displayed again. (even for users with Internal IP addresses).
