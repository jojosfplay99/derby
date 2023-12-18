"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var tslib_1 = require("tslib");
var react_1 = tslib_1.__importDefault(require("react"));
var styled_components_1 = tslib_1.__importDefault(require("styled-components"));
var StyledSun = styled_components_1.default.i(templateObject_1 || (templateObject_1 = tslib_1.__makeTemplateObject(["\n  &{box-sizing:border-box;position:relative;display:block;transform:scale(var(--ggs,1));width:24px;height:24px;background:linear-gradient(to bottom,currentColor 4px,transparent 0)no-repeat 5px -6px/2px 6px,linear-gradient(to bottom,currentColor 4px,transparent 0)no-repeat 5px 14px/2px 6px,linear-gradient(to bottom,currentColor 4px,transparent 0)no-repeat -8px 5px/6px 2px,linear-gradient(to bottom,currentColor 4px,transparent 0)no-repeat 14px 5px/6px 2px;border-radius:100px;box-shadow:inset 0 0 0 2px;border:6px solid transparent}&::after,&::before{content:\"\";display:block;box-sizing:border-box;position:absolute;width:24px;height:2px;border-right:4px solid;border-left:4px solid;left:-6px;top:5px}&::before{transform:rotate(-45deg)}&::after{transform:rotate(45deg)}\n"], ["\n  &{box-sizing:border-box;position:relative;display:block;transform:scale(var(--ggs,1));width:24px;height:24px;background:linear-gradient(to bottom,currentColor 4px,transparent 0)no-repeat 5px -6px/2px 6px,linear-gradient(to bottom,currentColor 4px,transparent 0)no-repeat 5px 14px/2px 6px,linear-gradient(to bottom,currentColor 4px,transparent 0)no-repeat -8px 5px/6px 2px,linear-gradient(to bottom,currentColor 4px,transparent 0)no-repeat 14px 5px/6px 2px;border-radius:100px;box-shadow:inset 0 0 0 2px;border:6px solid transparent}&::after,&::before{content:\"\";display:block;box-sizing:border-box;position:absolute;width:24px;height:2px;border-right:4px solid;border-left:4px solid;left:-6px;top:5px}&::before{transform:rotate(-45deg)}&::after{transform:rotate(45deg)}\n"])));
exports.Sun = react_1.default.forwardRef(function (props, ref) {
    return (react_1.default.createElement(react_1.default.Fragment, null,
        react_1.default.createElement(StyledSun, tslib_1.__assign({}, props, { ref: ref, "icon-role": "sun" }))));
});
var templateObject_1;
//# sourceMappingURL=Sun.js.map