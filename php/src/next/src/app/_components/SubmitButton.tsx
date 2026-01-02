"use client";
// useFormStatus・・・19からの新機能hformのactionを受け取ったりmethodを受け取ったりできる。
// 子コンポーネントで扱う必要があり、フォーム内アクションが実行されている最中はtrue扱いになり、完了後falseになる。
// https://qiita.com/Yasushi-Mo/items/3bebc244a97534c96382
// 今回の場合だとpendinglabelとchildrenを先に宣言。
// pendinglabelは子コンポーネントに直接付属させた要素。
// childrenは親コンポーネントに挟まれている子要素や文字列が対象になる。
import { useFormStatus } from "react-dom";
export default function SubmitButton({
  children,
  pendingLabel,
}: {
  children: string;
  pendingLabel: string;
}) {
  // ここで親コンポーネントのフォームのアクションの経過やメソッドを取得できる。
  // 今回の場合だとフォームのアクションを行っている途中経過で処理実行中はtrueに
  // なっている。(disabledはtrueの間クリックできなくなる。
  // {pending ? pendingLabel : children}はpendingLabel側はtrue時の処理なので
  // Loading...が表示され、処理が終わったらfalseに変わって再度Login as guestに戻る。)
  // （useActionStateでもいけるらしい)
  const { pending } = useFormStatus();

  return (
    <button
      className="rounded-full bg-[#675AF2] px-8 py-3 font-semibold tracking-wide text-white transition-all disabled:cursor-not-allowed disabled:bg-gray-500"
      disabled={pending}
    >
      {pending ? pendingLabel : children}
    </button>
  );
}
