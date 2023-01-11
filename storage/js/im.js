/**
 * class名称枚举
 * @type {string}
 */

/** 客服div class name **/
const ELEMENT_NAME = 'customer_service';
/** 服务key class name **/
const APP_KEY = 'key';
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

/** 单条消息类型表情数据 **/
let toMessage = {
    "avatar":"https://cdn.learnku.com//uploads/communities/Y7fElYYwCFjTTXCdwPNW.png!/both/44x44",
    "fid":"你好，请问你家产品怎么卖买",
    "data":{
    },
    "message_type":1,
    "me":false,
    "created_at":"2023-01-11 20:59:44"
}
let formMessage = {
    "avatar":"https://cdn.learnku.com/uploads/avatars/32593_1652273246.jpeg!/both/200x200",
    "fid":"",
    "data":"您好有什么问题可以帮助到您！",
    "message_type":1, //消息类型 1、文本 2、文件 3、图片 4、富文本 5、超链接
    "me":true,
    "created_at":"2023-01-11 21:01:44"
}

// 多条消息类型
const messageList = [
    formMessage,
    toMessage,
    formMessage,
    toMessage,
    toMessage
]

/**
 * 主体类
 */
class TestElementObject {
    // dom 实例
    _documentObject = null
    _serviceObject = null
    _config = []
    init() {
        if(this._object == null) {
            this._object = document.getElementsByClassName(ELEMENT_NAME)
        }
        // 初始化服务
        this.initService()
        return this;
    }

    checkConfig()
    {
        if(this._config[APP_KEY] === undefined ) {
            return false;
        }
        return true;
    }


    setConfig(value)
    {
        this._config[APP_KEY] = value
        console.log(this._config)
        return this;
    }

    initService() {
        if(!this.checkConfig()) {
            console.log('缺少服务key')
            return;
        }
    }

    // 动态设置dom
    setDom(){

    }
}



// function init()
// {
//     let elementTestDom = document.getElementsByClassName("");
// }
let elementTest = document.getElementById(ELEMENT_NAME)
// elementTest.insertAdjacentHTML('afterend'," <div class=\"user\">\n" +
//     "        <div class=\"user_name\"></div>\n" +
//     "        <img id=\"user_img\" src=\"https://cdn.learnku.com/uploads/avatars/32593_1652273246.jpeg!/both/200x200\">\n" +
//     "    </div>\n" +
//     "    <div id=\"message_content\" class=\"action_hide\">\n" +
//     "        <div>\n" +
//     "            <textarea></textarea>\n" +
//     "        </div>\n" +
//     "    </div>")
let userAvatar = document.getElementById("user_avatar")
let chatWindow = document.getElementById("chat_window")
userAvatar.addEventListener("click",function (){
    var className = chatWindow.getAttribute("class")
    if(className == null) {
        chatWindow.setAttribute("class","action_hide")
    } else{
        chatWindow.removeAttribute("class","action_hide")
    }
});

