# features/dir.feature
Feature: dir
  In order to see the directory structure
  As a Windows user
  I need to be able to list the current directory's contents

  Scenario: List 2 files in a directory
  Given I am in a directory "test"
  And I have a file named "foo"
  And I have a file named "bar"
  When I run "dir /B"
  Then I should get:
    """
    bar
    foo
    """
