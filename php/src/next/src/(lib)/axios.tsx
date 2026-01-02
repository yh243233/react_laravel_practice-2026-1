import Axios from 'axios'

const axios = Axios.create({
    baseURL: process.env.NEXT_PUBLIC_BACKEND_URL,
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
    },
    // これはクロスオリジンリクエストにおいてクッキーや認証情報の送信の有無を設定する。
    // クロスオリジンを有効にする場合、サーバー側で
    // Access-Control-Allow-Credentials: true の設定が必要。
    withCredentials: true,
    withXSRFToken: true
})

export default axios

// サーバー側で
// Access to XMLHttpRequest at 'http://localhost:3001/users' from origin
// 'http://localhost:3002' has been blocked by CORS policy:
// Response to preflight request doesn't pass access control
// check: The value of the 'Access-Control-Allow-Origin' header in
// the response must not be the wildcard '*' when the request's
// credentials mode is 'include'. The credentials mode of requests
// initiated by the XMLHttpRequest is controlled by the withCredentials attribute.

// のようなエラーが発生する。ざっくり言えば
// withCredentials: trueを設定する事で認証時のリクエスト
// がサーバー側でAccess-Control-Allow-Credentials: trueで許可されているかの確認が入る。
// ダメだった場合リクエスト側で新たなポート番号を用意して再リクエストが入る
// その設定はlib/axiosに設定。
