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
                    <el-button type="primary" icon="el-icon-delete" size="mini" @click="deleteMusic(scope.row.id)"></el-button>
                </template>
            </el-table-column>

        </el-table>
        <div style="margin-top: 20px">
            <el-button @click="">删除</el-button>
            <el-button @click="toggleSelection()">取消选择</el-button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
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
            deleteMusic(id) {
                let self = this;
                console.log(id);
                axios.post("/music/delete",{id:id}).then(function (response) {
                    var data = response.data;
                    console.log(data);
                    if(data.code == 0){
                        self.$notify({
                            type: 'success',
                            message: data.msg,
                            duration: 2000,
                        });
                        self.getMusicData();
                    }else{
                        self.$notify({
                            type: 'error',
                            message: data.msg,
                            duration: 2000,
                        });
                    }
                });

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