<template>
   <div>
       <el-table
               ref="multipleTable"
               :data="music"
               tooltip-effect="dark"
               style="width: 100%"
               @selection-change="handleSelectionChange">
           <el-table-column
                   type="selection"
                   width="55">
           </el-table-column>
           <el-table-column
                   prop="id"
                   label="编号"
                   width="120">
           </el-table-column>
           <el-table-column
                   prop="name"
                   label="歌名"
                   width="120">
           </el-table-column>
           <el-table-column
                   prop="author"
                   label="作者"
                   width="120">
           </el-table-column>
           <el-table-column
                   prop="type"
                   label="类型"
                   width="120">
           </el-table-column>
           <el-table-column
                   prop="language"
                   label="语言"
                   width="120">
           </el-table-column>
           <el-table-column
                   prop="content"
                   label="歌词"
                   show-overflow-tooltip>
           </el-table-column>
           <el-table-column
                   label="操作"
                   width="120">
               <template slot-scope="scope">
                   <el-button type="primary" icon="el-icon-document" size="mini" @click="view(scope.row)"></el-button>
               </template>
           </el-table-column>
       </el-table>
       <el-pagination
               background
               layout="prev, pager, next"
               :total="10">
       </el-pagination>
       <div style="margin-top: 80px">
           <el-button @click="">删除</el-button>
           <el-button @click="toggleSelection()">取消选择</el-button>
       </div>
       <div v-for="item in myMusic" :key="item" :display="show" class="items">
           {{ item }}
       </div>
   </div>
</template>

<style>
    .el-pagination{
        float: right;
        margin: 30px 0;
    }
    .el-pagination:after{
        clear: both;
    }
    .information{
        margin-top: 50px;
    }
    .items{
        width: 970px;
    }
</style>

<script>
    export default {
        data() {
            return {
                myMusic: [],
                show:false,
                music: [{
                    id: '',
                    name: '',
                    author: '',
                    type: '',
                    language: '',
                    content: '',

                }],
                multipleSelection: []
            }
        },

        mounted() {
            this.getMusicData();
        },

        methods: {
            view(music) {
                console.log(music);
                this.myMusic = music;
                this.show = true;
            },

            toggleSelection(rows) {
                if (rows) {
                    rows.forEach(row => {
                        this.$refs.multipleTable.toggleRowSelection(row);
                    });
                } else {
                    this.$refs.multipleTable.clearSelection();
                }
            },
            handleSelectionChange(val) {
                this.multipleSelection = val;
            },
            getMusicData(){
                let self = this;
                axios.post("/music").then(function (response) {
                    var data = response.data;
                    if(data.code == 0){
                        self.music = data.result;
                    }else{
                        self.$notify({
                            type: 'error',
                            message: data.msg,
                            duration: 2000,
                        });
                    }
                });
            },
        }
    }
</script>