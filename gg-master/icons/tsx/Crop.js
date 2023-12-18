"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var tslib_1 = require("tslib");
var react_1 = tslib_1.__importDefault(require("react"));
var styled_components_1 = tslib_1.__importDefault(require("styled-components"));
var StyledCrop = styled_components_1.default.i(templateObject_1 || (templateObject_1 = tslib_1.__makeTemplateObject(["\n  &{box-sizing:border-box;position:relative;display:block;transform:scale(var(--ggs,1));width:20px;height:20px}&::after,&::before{content:\"\";display:block;box-sizing:border-box;position:absolute;width:14px;height:14px}&::before{border-right:2px solid;border-top:2px solid;left:1px;top:5px}&::after{border-left:2px solid;border-bottom:2px solid;top:1px;right:1px}\n"], ["\n  &{box-sizing:border-box;position:relative;display:block;transform:scale(var(--ggs,1));width:20px;height:20px}&::after,&::before{content:\"\";display:block;box-sizing:border-box;position:absolute;width:14px;height:14px}&::before{border-right:2px solid;border-top:2px solid;left:1px;top:5px}&::after{border-left:2px solid;border-bottom:2px solid;top:1px;right:1px}\n"])));
exports.Crop = react_1.default.forwardRef(function (props, ref) {
    return (react_1.default.createElement(react_1.default.Fragment, null,
        react_1.default.createElement(StyledCrop, tslib_1.__assign({}, props, { ref: ref, "icon-role": "crop" }))));
});
var templateObject_1;
//# sourceMappingURL=Crop.js.map