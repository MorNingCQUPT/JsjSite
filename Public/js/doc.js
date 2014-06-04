/**
 * Created by Admin on 14-6-2.
 */
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement("style")
    msViewportStyle.appendChild(
        document.createTextNode(
            "@-ms-viewport{width:auto!important}"
        )
    )
    document.getElementsByTagName("head")[0].appendChild(msViewportStyle)
}