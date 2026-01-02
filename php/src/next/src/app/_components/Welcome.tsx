// use clientはクライアント側で宣言されるコンポーネントのみレンダリングされる様にするもの
// ユーザーインタラクション（状態管理、イベントハンドリング、エフェクトフックなど）を含む場合、
// サーバー側でのレンダリングは適切ではなく、クライアントサイドでの実行が求められます
// Next.jsのServer ComponentsとClient Componentsの区別を管理するための重要な要素。
// "use client"の反対は特に無く基本的にnext.jsはデフォルトでサーバーサイドでレンダリングされる。
// サーバーコンポーネントは、useStateやuseEffectといったクライアントサイドでのみ使用可能なフックは使用できません。
// APIリクエストやデータベースとの通信など、サーバー側で処理したい部分に適しています
"use client";
import { useState } from "react";
import SignUpForm from "@/app/_components/SignUpForm";
import LoginForm from "@/app/_components/LoginForm";
import SignInButton from "./SignInButton";
import SubmitButton from "./SubmitButton";
// ローディングに関係する
import { loginTestUser } from "../_utils/actions";

function Welcome() {
  // これらの関数はフックという。(関数コンポーネントともいう。)これらフックはクラス内では発火しない。
  // 代表的な物は以下の3つになる
  // useState・・・変数の保持とセットができる。useStateの機能を使いたい場合はimportで宣言する。
  // この変数の値を変更したい場合はsetを使わないといけない。
  // useEffect・・・データの監視ができるフック。レンダリング(画面描写)が終了後に発火させるフック。
  // 基本レンダリングが完了してからデータの流し込みを行う。
  // useContext・・・Reduxを導入せずに親コンポーネントから子コンポーネントに値の受け渡しが出来るフック
  // 他のフックは上のフックの派生となるのでまずはこの三つを覚える
  const [activeTab, setActiveTab] = useState("login");
  return (
    <div className="mx-auto my-auto max-w-3xl">
      <h1 className="py-6 text-center text-3xl font-semibold">Echo</h1>
      <div className="mt-10 rounded-lg">

        <div className="mt-10 flex items-center justify-center gap-10">
          <button
            // classNameがloginだった場合バックグラウンドカラーは青紫、文字は白色になる。他の場合は黒色になる
            className={`${activeTab === "login" ? "bg-[#675AF2] text-white" : "bg-white-400 text-black"} rounded-2xl px-6 py-3 uppercase tracking-wide`}
            // ここで上のstateをloginに切り替える
            onClick={() => setActiveTab("login")}
          >
            login
          </button>
          <button
            // classNameがsignUpだった場合バックグラウンドカラーは青紫、文字は白色になる。他の場合は黒色になる
            className={`${activeTab === "signup" ? "bg-[#675AF2] text-white" : "bg-white-400 text-black"} rounded-2xl px-6 py-3 uppercase tracking-wide`}
            // ここで上のstateをsignupに切り替える
            onClick={() => setActiveTab("signup")}
          >
            sign up
          </button>
        </div>

        <div className="mt-10 flex flex-col items-center justify-center gap-10">

          {/* ステートに依存する */}
          <h1 className="text-3xl font-semibold">
            {activeTab === "login" ? "Come on in!" : "Sign up!"}
          </h1>
          {/* 外部APIを使ったログイン箇所 */}
          <SignInButton />
          {activeTab === "login" ? <LoginForm /> : <SignUpForm />}
          {/* ログインではない時のメッセージ */}
          {activeTab !== "login" && (
            <span className="max-w-1/4 block text-center text-gray-500">
              Echo is Good Enough. We promise not to spam you or sell your
              contact info. By signing up for Echo, you agree to our Terms of
              Service and Privacy Policy.
            </span>
          )}

          {/* ゲストログイン */}
          {activeTab === "login" && (
            <form action={loginTestUser}>
              <SubmitButton pendingLabel="Loading...">
                Login as guest
              </SubmitButton>
            </form>
          )}
        </div>
      </div>
    </div>
  );
}

export default Welcome;
