addScript('http://i.gtimg.cn/qzone/biz/gdt/lib/jquery/jquery-2.1.4.js?max_age=31536000');
// https://www.cnblogs.com/hb-liang/p/12068749.html
addScript('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js');
addScript('https://unpkg.com/ionicons@5.0.0/dist/ionicons.js');
//https://www.wangeditor.com/v5/getting-started.html#%E5%BC%95%E5%85%A5-css-%E5%AE%9A%E4%B9%89%E6%A0%B7%E5%BC%8F
// addScript('https://unpkg.com/@wangeditor/editor@latest/dist/index.js');
/**
 * class名称枚举
 * @type {string}
 */

/** 客服div class name **/
const ELEMENT_NAME = 'customer_service';
/** 服务key class name **/
const APP_KEY = 'yyyyy';
const APP_WS = 'ws';
const IM_WS_FD = 'im_ws_fd';
const SESSION_ID = 'session_id';
const domain = 'http://127.0.0.1:8000'
/** 表情数据 **/
const EMOJI_DATA = [
    {
        "codes": "1F600",
        "char": "😀",
        "name": "grinning face"
    },
    {
        "codes": "1F603",
        "char": "😃",
        "name": "grinning face with big eyes"
    },
    {
        "codes": "1F604",
        "char": "😄",
        "name": "grinning face with smiling eyes"
    },
    {
        "codes": "1F601",
        "char": "😁",
        "name": "beaming face with smiling eyes"
    },
    {
        "codes": "1F606",
        "char": "😆",
        "name": "grinning squinting face"
    },
    {
        "codes": "1F605",
        "char": "😅",
        "name": "grinning face with sweat"
    },
    {
        "codes": "1F923",
        "char": "🤣",
        "name": "rolling on the floor laughing"
    },
    {
        "codes": "1F602",
        "char": "😂",
        "name": "face with tears of joy"
    },
    {
        "codes": "1F642",
        "char": "🙂",
        "name": "slightly smiling face"
    },
    {
        "codes": "1F643",
        "char": "🙃",
        "name": "upside-down face"
    },
    {
        "codes": "1F609",
        "char": "😉",
        "name": "winking face"
    },
    {
        "codes": "1F60A",
        "char": "😊",
        "name": "smiling face with smiling eyes"
    },
    {
        "codes": "1F607",
        "char": "😇",
        "name": "smiling face with halo"
    },
    {
        "codes": "1F970",
        "char": "🥰",
        "name": "smiling face with hearts"
    },
    {
        "codes": "1F60D",
        "char": "😍",
        "name": "smiling face with heart-eyes"
    },
    {
        "codes": "1F929",
        "char": "🤩",
        "name": "star-struck"
    },
    {
        "codes": "1F618",
        "char": "😘",
        "name": "face blowing a kiss"
    },
    {
        "codes": "1F617",
        "char": "😗",
        "name": "kissing face"
    },
    {
        "codes": "1F61A",
        "char": "😚",
        "name": "kissing face with closed eyes"
    },
    {
        "codes": "1F619",
        "char": "😙",
        "name": "kissing face with smiling eyes"
    },
    {
        "codes": "1F44B",
        "char": "👋",
        "name": "waving hand"
    },
    {
        "codes": "1F91A",
        "char": "🤚",
        "name": "raised back of hand"
    },
    {
        "codes": "1F590",
        "char": "🖐",
        "name": "hand with fingers splayed"
    },
    {
        "codes": "270B",
        "char": "✋",
        "name": "raised hand"
    },
    {
        "codes": "1F596",
        "char": "🖖",
        "name": "vulcan salute"
    },
    {
        "codes": "1F44C",
        "char": "👌",
        "name": "OK hand"
    },
    {
        "codes": "1F90F",
        "char": "🤏",
        "name": "pinching hand"
    },
    {
        "codes": "270C",
        "char": "✌",
        "name": "victory hand"
    },
    {
        "codes": "1F91E",
        "char": "🤞",
        "name": "crossed fingers"
    },
    {
        "codes": "1F91F",
        "char": "🤟",
        "name": "love-you gesture"
    },
    {
        "codes": "1F918",
        "char": "🤘",
        "name": "sign of the horns"
    },
    {
        "codes": "1F919",
        "char": "🤙",
        "name": "call me hand"
    },
    {
        "codes": "1F448",
        "char": "👈",
        "name": "backhand index pointing left"
    },
    {
        "codes": "1F449",
        "char": "👉",
        "name": "backhand index pointing right"
    },
    {
        "codes": "1F446",
        "char": "👆",
        "name": "backhand index pointing up"
    },
    {
        "codes": "1F595",
        "char": "🖕",
        "name": "middle finger"
    },
    {
        "codes": "1F447",
        "char": "👇",
        "name": "backhand index pointing down"
    },
    {
        "codes": "261D FE0F",
        "char": "☝️",
        "name": "index pointing up"
    },
    {
        "codes": "1F44D",
        "char": "👍",
        "name": "thumbs up"
    },
    {
        "codes": "1F44E",
        "char": "👎",
        "name": "thumbs down"
    },
    {
        "codes": "270A",
        "char": "✊",
        "name": "raised fist"
    },
    {
        "codes": "1F44A",
        "char": "👊",
        "name": "oncoming fist"
    },
    {
        "codes": "1F91B",
        "char": "🤛",
        "name": "left-facing fist"
    },
    {
        "codes": "1F91C",
        "char": "🤜",
        "name": "right-facing fist"
    }

]


/** @var int 文本消息 */
const TEXT_MESSAGE = 1;
/** @var int 文件消息 */
const FILE_MESSAGE = 2;
/** @var int 图片消息 */
const IMG_MESSAGE = 3;
/** @var int 语音消息 */
const VOICE_MESSAGE = 4;
/** @var int 富文本消息 */
const RICH_TEXT_MESSAGE = 5;
const FD_MESSAGE = 6;
const DOWN_MESSAGE = 7;
/** @var int 会话列表 */
const SESSION_LIST = 9;
const IM_COOKIE = 'im_cookie';

let customer_service = document.getElementById("customer_service")
customer_service.innerHTML = `
    <div class="wave">
        <div class="message_alert_count">0</div>
        <img id="user_avatar" src="https://cdn.learnku.com/uploads/avatars/32593_1652273246.jpeg!/both/200x200">
        <span></span>
        <span></span>
        <span></span>
    </div>
        <div id="chat_window" class="action_hide">
<!--    <div id="chat_window">-->
        <button id="message_alert_down" class="py-2 px-4 font-semibold rounded-lg shadow-md text-white message_alert_down">
            关闭
        </button>
        <div class="chat">
            <div id="chat_content" class="chat_message">
                <div class="message_alert"><span>提示：</span>本软件禁止用于含病毒、木马、色情、赌博、诈骗、违禁用品、假冒产品、虚假信息等违法违规业务，若发现，将依法进行处理，对其业务造成的影响概不负责！</div>
            </div>
        </div>
        <div class="content">
            <div class="msg_tool"></div>
            <div class="send_message">
                <div id="editor—wrapper">
                    <div id="toolbar-container">
                        <span><ion-icon class="images_label" name="happy-outline"></ion-icon></span>
                        <span><ion-icon class="images_label" onclick="fileUpload('image')" name="image-outline"></ion-icon></span>
                        <span><ion-icon class="images_label" onclick="fileUpload('file')" name="folder-outline"></ion-icon></span>
                    </div>
                    <input type="file" class="action_hide" id="im-upload-image"  rel="im-upload-image" accept=".png,.jpeg,.jpg,.gif"  multiple>
                    <input type="file" class="action_hide" id="im-upload-file"  rel="im-upload-image" accept=".mp4,.txt"  multiple>
                    <div id="editor-container"><!-- 编辑器 --></div>
                </div>
                <textarea id="textarea" placeholder="请输入消息" class="chat_edit resize-none border rounded-md" rows="8" ></textarea>
            </div>
            <div>
                <button id="send_message" class="py-2 px-4 font-semibold rounded-lg shadow-md text-white right">
                    发送
                </button>
            </div>
        </div>
    </div>
`


let userAvatar = document.getElementById("user_avatar")
let chatWindow = document.getElementById("chat_window")
let sendMessage = document.getElementById("send_message")
let messageAlertDown = document.getElementById("message_alert_down")
let messageAlertCount = document.querySelectorAll(".message_alert_count")
/** 单条消息类型表情数据 **/
let toMessage = {
    "avatar": "https://cdn.learnku.com/uploads/avatars/32593_1652273246.jpeg!/both/200x200",
    "fid": 1,
    "message": "你好，请问你家产品怎么卖买",
    "data": {},
    "code": 1,
    "me": false,
    "name": "我",
    "created_at": "2023-01-11 20:59:44",
    "is_client":true,
    "session_id":0,
    "cookie":0,
}
let formMessage = {
    "avatar": "https://cdn.learnku.com/uploads/avatars/32593_1652273246.jpeg!/both/200x200",
    "fid": "",
    "message": "您好有什么问题可以帮助到您！",
    "code": 1, //消息类型 1、文本 2、文件 3、图片 4、富文本 5、超链接
    "me": true,
    "data": {},
    "name": "小智客服",
    "created_at": "2023-01-11 21:01:44"
}

// 多条消息类型
const messageList = [
    formMessage,
    toMessage,
    formMessage,
    toMessage,
    toMessage
]

// 服务类
class ImService {
    _serviceObject = null
    _config = []

    init() {
        if (this._object == null) {
            this._object = document.getElementsByClassName(ELEMENT_NAME)
        }
        // 初始化服务
        this.initService()
        return this;
    }

    checkConfig() {
        if (this._config.APP_KEY === undefined || this._config.APP_WS === undefined) {
            return false;
        }
        return true;
    }

    setConfig(config = {
        APP_KEY: "", // 服务秘钥
        APP_WS: "" // 服务地址
    }) {
        this._config = config
        return this;
    }

    initService() {
        if (!this.checkConfig()) {
            toastr.error('请填充服务配置！', '错误');
            return;
        }
        setCookie(IM_COOKIE, 'im_cookie' + Date.now(), 24)
        this._serviceObject = new WebSocket(this._config.APP_WS + '?cookie=' + getCookie(IM_COOKIE));
        //设置会话
        // 获取连接状态
        console.log('ws连接状态：' + this._serviceObject.readyState);
        //监听是否连接成功
        this._serviceObject.onopen = function () {
            console.log('ws连接状态：' + this._serviceObject);
            //连接成功则发送一个数据
        }
        // 接听服务器发回的信息并处理展示
        this._serviceObject.onmessage = function (chat) {
            messageAlertCount.text++;
            let message = JSON.parse(chat.data)
            console.log('接收到来自服务器的消息：', message);
            switch (message.code) {
                case TEXT_MESSAGE:
                    TextMessage(message);
                    break;
                case FILE_MESSAGE:
                    imageFileMessage(message)
                    break;
                case IMG_MESSAGE:
                    imageFileMessage(message)
                    break;
                case FD_MESSAGE:
                    setFdMessage(message.fid,message.session_id)
                    break;
                case DOWN_MESSAGE:
                    //清理cookie
                    delCookie(IM_COOKIE)
                    //关闭当前会话
                    break;
                case SESSION_LIST:
                    //清理cookie
                    setSessionMessage(message)
                    //关闭当前会话
                    break;
                default:
                    cueTonePlay();
                    console.log('消息异常')
                    break;
            }

        }
        // 监听连接关闭事件
        this._serviceObject.onclose = function () {
            // 监听整个过程中websocket的状态
            console.log('ws连接状态：' + this._serviceObject);
        }
        // 监听并处理error事件
        this._serviceObject.onerror = function (error) {
            this._serviceObject = null;
            setTimeout(() => {
                this.init()
            }, 1000)
            console.log(error);
        }
    }

    // 动态设置dom
    setDom() {

    }
}

function setSessionMessage(messages)
{
    messages.data.forEach(function (message) {

        switch (message.message.code ) {
            case TEXT_MESSAGE:
                TextMessage(message.message);
                break;
            case FILE_MESSAGE:
                imageFileMessage(message.message)
                break;
            case IMG_MESSAGE:
                imageFileMessage(message.message)
                break;
            default:
                break;
        }
    })
}

function setFdMessage(fd,session_id) {
    setCookie(IM_WS_FD, fd, 24)
    setCookie(SESSION_ID, session_id, 24)
}
function imageFileMessage(message) {
    switch (message.code) {
        case FILE_MESSAGE:
            var content = `<a target="_blank" href="${message.message}"> <span><ion-icon name="document-outline"></ion-icon>${message.data.name}</span></a>`;
            break;
        case IMG_MESSAGE:
            var content = `<a href="${message.message}" target="_blank"><img  src="${message.message}"></a>`;
            break;
        default:
            var content = ``;
            break;
    }

    var html = `
              <div class="user_right">
                    <div class="chat_msg_right">
                        <div class="chat_msg_top_right">
                          <!--    <span>${message.name}</span> -->
                            <span>${message.created_at}</span>
                        </div>
                        <div class="chat_msg_content_right">
                            <span class="message_before_right"></span>
                            <div class="chat_msg_content_right">${content}</div>
                             <div class="chat_avatar_right">
                                <img src='${message.avatar}'>
                            </div>
                        </div>
                    </div>
                </div>
            `;

    let chatContent = document.getElementById("chat_content")
    chatContent.insertAdjacentHTML('beforeend', html)
    console.log(chatContent.scrollHeight)
    chatContent.scrollTop = chatContent.scrollHeight
}


//设置 cookie
function setCookie(objName, objValue, objHours) {
    var str = objName + "=" + encodeURIComponent(objValue);
    // 没过期设置
    if (objHours > 0 && getCookie(objName) === -1) {
        var date = new Date();
        var ms = objHours * 3600 * 1000;
        date.setTime(date.getTime() + ms);
        str += "; expires=" + date.toUTCString();
        document.cookie = str;
    }
}

function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(";");
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i].trim();
        if (c.indexOf(name) === 0) {
            return encodeURIComponent(c.substring(name.length, c.length));
        }
    }
    return -1;

}


function delCookie(name) {
    var date = new Date();
    date.setTime(date.getTime() - 10000);
    document.cookie = name + "=a; expires=" + date.toUTCString();
}

// 文本消息设置
function TextMessage(message) {
    if (message.is_client) {
        var html = `
              <div class="user_right">
                    <div class="chat_msg_right">
                        <div class="chat_msg_top_right">
                          <!--    <span>${message.name}</span> -->
                            <span>${message.created_at}</span>
                        </div>
                        <div class="chat_msg_content_right">
                            <span class="message_before_right"></span>
                            <div class="chat_msg_content_right"><span>${message.message}</span></div>
                             <div class="chat_avatar_right">
                                <img src='${message.avatar}'>
                            </div>
                        </div>
                    </div>
                </div>
            `;
    } else {
        var html = `
              <div class="user_left">
                    <div class="chat_msg_left">
                        <div class="chat_msg_top_left">
                            <span>${message.name}</span>
                            <span>${message.created_at}</span>
                        </div>
                        <div class="chat_msg_content_left">
                            <div class="chat_avatar_left">
                                <img src='${message.avatar}'>
                            </div>
                            <span class="message_before_left"></span>
                            <div class="chat_msg_content_left"><span>${message.message}</span></div>
                        </div>
                    </div>
                </div>
            `;
    }
    let chatContent = document.getElementById("chat_content")
    chatContent.insertAdjacentHTML('beforeend', html)
    console.log(chatContent.scrollHeight)
    chatContent.scrollTop = chatContent.scrollHeight
}


let elementTest = document.getElementById(ELEMENT_NAME)

let imService = new ImService();

// 监听头像点击事件
userAvatar.addEventListener("click", function () {
    var className = chatWindow.getAttribute("class")
    if (className == null) {
        chatWindow.setAttribute("class", "action_hide")
    } else {
        if (imService._serviceObject == null) {
            //执行实例化操作
            imService.setConfig({
                APP_KEY: "yyyyy",
                APP_WS: "ws://127.0.0.1:9502",
            }).init();
        }
        chatWindow.removeAttribute("class", "action_hide")
    }
});
messageAlertDown.addEventListener("click", function () {
    chatWindow.setAttribute("class", "action_hide")
});


let text = document.getElementById("textarea")
// 发送消息
send()
document.onkeydown = function (event) {
    if (event.keyCode == 13) {
        send()
    }
};

// 发送消息
function send() {
    sendMessage.addEventListener("click", function () {
        var message = text.value
        console.log(message)
        if (message.length === 0) {
            toastr.error('消息不能为空！', '错误');
        } else {
            sendMessages(message, TEXT_MESSAGE)
            text.value = ""
        }
    })
}

function initSession() {

}

function sendMessages(message, msg_type, data = {}) {
    if (msg_type === TEXT_MESSAGE) {
        toMessage.message = replaceSrc(message)
    } else {
        toMessage.message = message
    }
    toMessage.session_id = getCookie(SESSION_ID)
    toMessage.cookie = getCookie(IM_COOKIE)
    toMessage.data = data
    toMessage.code = msg_type
    toMessage.created_at = "刚刚"
    toMessage.fid = Number(getCookie(IM_WS_FD))
    imService._serviceObject.send(
        JSON.stringify(toMessage)
    )
}


// 引入外部js文件
function addScript(url) {
    document.write("<script language=javascript src=" + url + "></script>");
}


// 音乐提示音
let audio = new Audio();
var src = "y1197.wav";

function cueTonePlay() {
    var playPromise;
    audio.src = src;
    playPromise = audio.play();
    if (playPromise) {
        playPromise.then(() => {
            setTimeout(() => {
                console.log("done.");
            }, audio.duration * 1000); // audio.duration 为音频的时长单位为秒
        }).catch((e) => {
        });
    }
}


// var cookie = {
//     set:function(key,val,time){//设置cookie方法
//         var date=new Date(); //获取当前时间
//         var expiresDays=time;  //将date设置为n天以后的时间
//         date.setTime(date.getTime()+expiresDays*24*3600*1000); //格式化为cookie识别的时间
//         document.cookie=key + "=" + val +";expires="+date.toGMTString();  //设置cookie
//     },
//     get:function(key){//获取cookie方法
//         /*获取cookie参数*/
//         var getCookie = document.cookie.replace(/[ ]/g,"");  //获取cookie，并且将获得的cookie格式化，去掉空格字符
//         var arrCookie = getCookie.split(";")  //将获得的cookie以"分号"为标识 将cookie保存到arrCookie的数组中
//
//         var tips;  //声明变量tips
//         for(var i=0;i<arrCookie.length;i++){   //使用for循环查找cookie中的tips变量
//             var arr=arrCookie[i].split("=");   //将单条cookie用"等号"为标识，将单条cookie保存为arr数组
//             if(key==arr[0]){  //匹配变量名称，其中arr[0]是指的cookie名称，如果该条变量为tips则执行判断语句中的赋值操作
//                 tips=arr[1];   //将cookie的值赋给变量tips
//                 break;   //终止for循环遍历
//             }
//         }
//         return tips;
//     },
//     delete:function(key){ //删除cookie方法
//         var date = new Date(); //获取当前时间
//         date.setTime(date.getTime()-10000); //将date设置为过去的时间
//         document.cookie = key + "=v; expires =" +date.toGMTString();//设置cookie
//     }
// }
//

// 给超链接加上标签
function replaceSrc(txt) {
    var reg = /(((https?:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/ig
    var result = txt.replace(reg, (item) => {
        return "<a href='" + item + "' target='_blank'>" + item + '</a>'
    })
    return result
}

function fileUpload(file) {
    if (file === 'image') {
        document.getElementById("im-upload-image").click()
    } else {
        if (file === 'file') {
            document.getElementById("im-upload-file").click()
        }
    }

}

document.getElementById("im-upload-image").addEventListener("change", function (e) {
    //文件上传

    try {
        console.log(e.target.files)
        let formData = new FormData(); //创建 form-data 对象
        formData.append("file", e.target.files[0]); // 创建 xhr，使用 ajax 进行文件上传
        formData.append("fileType", 'file'); // 创建 xhr，使用 ajax 进行文件上传
        let xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4 && this.response !== '') {
                var response = JSON.parse(this.response)
                if (response.code === 200) {
                    console.log(response.data)
                    sendMessages(response.data.url, IMG_MESSAGE)
                } else {
                    toastr.error(response.message, '错误');
                }
            } else {
                toastr.error('服务异常', '错误');
            }
        });

        xhr.open("POST", domain + "/api/v1/file/upload?app_key=yyyyy&user_token=xxxx");
        xhr.send(formData);
    } catch (e) {
        console.log(e.message)
    }


});
document.getElementById("im-upload-file").addEventListener("change", function (e) {
    //文件上传
    try {
        console.log(e.target.files)
        let formData = new FormData(); //创建 form-data 对象
        formData.append("file", e.target.files[0]); // 创建 xhr，使用 ajax 进行文件上传
        formData.append("fileType", 'file'); // 创建 xhr，使用 ajax 进行文件上传
        let xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4 && this.response !== '') {
                var response = JSON.parse(this.response)
                if (response.code === 200) {
                    console.log(response.data)
                    sendMessages(response.data.url, FILE_MESSAGE, {
                        name: response.data.name
                    })
                } else {
                    toastr.error(response.message, '错误');
                }
            } else {
                toastr.error('服务异常', '错误');
            }
        });

        xhr.open("POST", domain + "/api/v1/file/upload?app_key=yyyyy&user_token=xxxx");

        xhr.send(formData);
    } catch (e) {
        console.log(e.message)
    }
});
