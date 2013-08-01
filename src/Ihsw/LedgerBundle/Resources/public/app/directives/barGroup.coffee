# controller
controller = ($s, $f) ->
    # properties
    $s.group = {}
    $s.buttons = {}

    # methods
    @addButton = (button) ->
        $s.buttons[button.id] = button
    @getButtonCount = ->
        return $f('dictLength')($s.buttons)

    return @
controller.$inject = ['$scope', '$filter']

# link
link = ($s, element, attrs, BarController) ->
    # properties

    # generating a group
    group =
        id: BarController.getGroupCount()
        label: $s.$id
        buttons: $s.buttons

    # pushing it up
    BarController.addGroup group

# directive definition
window.module.directive 'barGroup', ->
    return {
        require: '^bar'
        restrict: 'E'
        controller: controller
        link: link
    }