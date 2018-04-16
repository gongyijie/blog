webpackJsonp([2],{

/***/ 207:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(25)
/* script */
var __vue_script__ = __webpack_require__(213)
/* template */
var __vue_template__ = __webpack_require__(214)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources\\assets\\js\\components\\changeComponent.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0d001ea6", Component.options)
  } else {
    hotAPI.reload("data-v-0d001ea6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 213:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            music: [{
                id: '',
                name: '',
                author: '',
                type: '',
                language: '',
                content: ''
            }],
            multipleSelection: []
        };
    },
    mounted: function mounted() {
        this.getMusicData();
    },


    methods: {
        toggleSelection: function toggleSelection(rows) {
            var _this = this;

            if (rows) {
                rows.forEach(function (row) {
                    _this.$refs.multipleTable.toggleRowSelection(row);
                });
            } else {
                this.$refs.multipleTable.clearSelection();
            }
        },
        handleSelectionChange: function handleSelectionChange(val) {
            this.multipleSelection = val;
        },
        getMusicData: function getMusicData() {
            var self = this;
            axios.post("/music").then(function (response) {
                var data = response.data;
                if (data.code == 0) {
                    self.music = data.result;
                } else {
                    self.$notify({
                        type: 'error',
                        message: data.msg,
                        duration: 2000
                    });
                }
            });
        }
    }
});

/***/ }),

/***/ 214:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "el-table",
        {
          ref: "multipleTable",
          staticStyle: { width: "100%" },
          attrs: { data: _vm.music, "tooltip-effect": "dark" },
          on: { "selection-change": _vm.handleSelectionChange }
        },
        [
          _c("el-table-column", { attrs: { type: "selection", width: "55" } }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { prop: "id", label: "编号", width: "120" }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { prop: "name", label: "歌名", width: "120" }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { prop: "author", label: "作者", width: "120" }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { prop: "type", label: "类型", width: "120" }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { prop: "language", label: "语言", width: "120" }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: {
              prop: "content",
              label: "歌词",
              "show-overflow-tooltip": ""
            }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { label: "操作", width: "120" },
            scopedSlots: _vm._u([
              {
                key: "default",
                fn: function(scope) {
                  return [
                    _c("el-button", {
                      attrs: {
                        type: "primary",
                        icon: "el-icon-edit",
                        size: "mini"
                      }
                    })
                  ]
                }
              }
            ])
          })
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "div",
        { staticStyle: { "margin-top": "20px" } },
        [
          _c("el-button", { on: { click: function($event) {} } }, [
            _vm._v("删除")
          ]),
          _vm._v(" "),
          _c(
            "el-button",
            {
              on: {
                click: function($event) {
                  _vm.toggleSelection()
                }
              }
            },
            [_vm._v("取消选择")]
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-0d001ea6", module.exports)
  }
}

/***/ })

});