$(function() {
    "use strict";

    var metadataLoader = new ThemeBuilder.MetadataLoader(),
        historyChangesManager = new ThemeBuilder.HistoryChangesManager(window.sessionStorage),
        previewIframeNotifier = new ThemeBuilder.PreviewIframeNotifier();

    function listener(event) {
        var data = JSON.parse(event.data);
        switch(data.action) {
            case "getCSS":
                ThemeBuilder.viewModel.showCSSPopup(data.actionData);
                break;
            case "saveCSS":
                ThemeBuilder.viewModel.saveCSSAs(data.actionData);
                break;
            case "stylesUpdated":
                ThemeBuilder.viewModel.toolboxValueUpdated(data.actionData.compiledMetadata, data.actionData.modifyVars);
                break;
            case "handleError":
                DevExpress.ui.dialog.alert(data.actionData.message, "Compilation error");
                break;
        }
    }

    if(window.addEventListener)
        window.addEventListener("message", listener, false);
    else
        window.attachEvent("onmessage", listener);

    ThemeBuilder.themes = [
        { themeId: 1, name: "generic", colorScheme: "light", text: "Light", group: 1 },
        { themeId: 2, name: "generic", colorScheme: "dark", text: "Dark", group: 1 },
        { themeId: 9, name: "generic", colorScheme: "light-compact", text: "Light Compact", group: 2 },
        { themeId: 10, name: "generic", colorScheme: "dark-compact", text: "Dark Compact", group: 2 },
        { themeId: 3, name: "ios7", colorScheme: "default", text: "iOS 7", group: 3 },
        { themeId: 6, name: "android5", colorScheme: "light", text: "Android 5", group: 3 },
        { themeId: 11, name: "win10", colorScheme: "black", text: "Win10 Black", group: 3 },
        { themeId: 12, name: "win10", colorScheme: "white", text: "Win10 White", group: 3 }
    ];

    ThemeBuilder.groupsAliasesRepository = new ThemeBuilder.GroupsAliasesRepository();
    ThemeBuilder.metadataRepository = new ThemeBuilder.MetadataRepository(metadataLoader);
    ThemeBuilder.metadataVersion = ThemeBuilder.__get_metadata_version();
    ThemeBuilder.viewModel = new ThemeBuilder.ViewModel(ThemeBuilder.metadataRepository, historyChangesManager, previewIframeNotifier, { beautify: css_beautify });
    ThemeBuilder.navigationTree = new ThemeBuilder.NavigationTree({
        rootItemClick: $.proxy(ThemeBuilder.viewModel.treeRootItemClick, ThemeBuilder.viewModel),
        childItemClick: $.proxy(ThemeBuilder.viewModel.treeItemClick, ThemeBuilder.viewModel)
    });
    ThemeBuilder.navigationTreeManager = new ThemeBuilder.NavigationTreeManager(ThemeBuilder.navigationTree, ThemeBuilder.viewModel, ThemeBuilder.metadataRepository);

    ThemeBuilder.viewModel.init(ThemeBuilder.themes);

    ko.applyBindings(ThemeBuilder.viewModel);
});
