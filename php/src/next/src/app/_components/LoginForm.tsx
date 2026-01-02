import { loginUser } from "../_utils/actions";
import SubmitButton from "./SubmitButton";

function Login() {
  return (
    // 基本的にform内にactionを用意してその中で非同期処理を行う。
    <form
      className="flex w-full max-w-md flex-col gap-4 border border-gray-300 p-8 shadow-lg"
      action={loginUser}
    >
      {/* classNameはstyleを装飾する為の物。
      htmlForは付属されたlabel範囲までクリックすると
      同じid属性を持つinput属性が反応する。 */}
      <label className="text-xl" htmlFor="email">
        Email
        <input
          className="input"
          type="email"
          id="email"
          name="email"
          required
        />
      </label>
      <label className="text-xl" htmlFor="password">
        Password
        <input
          className="input"
          type="password"
          id="password"
          name="password"
          required
        />
      </label>

      <SubmitButton pendingLabel="Loading...">Let's go →</SubmitButton>
    </form>
  );
}

export default Login;
